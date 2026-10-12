from http.server import SimpleHTTPRequestHandler, ThreadingHTTPServer
from pathlib import Path
import argparse
import gzip
import io
import os

class Handler(SimpleHTTPRequestHandler):
    def send_head(self):
        filename = self.translate_path(self.path)
        if os.path.isdir(filename):
            filename = os.path.join(filename, 'index.html')
        if not os.path.isfile(filename):
            return super().send_head()
        mime = self.guess_type(filename)
        data = Path(filename).read_bytes()
        compressed = 'gzip' in self.headers.get('Accept-Encoding', '') and (mime.startswith('text/') or mime in ['application/javascript', 'application/json', 'image/svg+xml'])
        if compressed:
            data = gzip.compress(data, compresslevel=6, mtime=0)
        self.send_response(200)
        self.send_header('Content-Type', mime)
        self.send_header('Content-Length', str(len(data)))
        self.send_header('Vary', 'Accept-Encoding')
        if compressed:
            self.send_header('Content-Encoding', 'gzip')
        self.end_headers()
        return io.BytesIO(data)

ap = argparse.ArgumentParser()
ap.add_argument('--port', type=int, required=True)
ap.add_argument('--directory', required=True)
args = ap.parse_args()
os.chdir(args.directory)
ThreadingHTTPServer(('127.0.0.1', args.port), Handler).serve_forever()
