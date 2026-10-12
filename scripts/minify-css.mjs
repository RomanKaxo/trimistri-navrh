import { minify } from 'csso';

// stdin/stdout keeps the build independent of temporary paths.
let source = '';
for await (const chunk of process.stdin) source += chunk;
const usage = process.argv[2] ? JSON.parse(process.argv[2]) : null;
process.stdout.write(minify(source, { restructure: true, usage }).css);
