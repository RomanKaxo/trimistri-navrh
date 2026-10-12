import { minify } from 'csso';

// stdin/stdout keeps the build independent of temporary paths.
let source = '';
for await (const chunk of process.stdin) source += chunk;
process.stdout.write(minify(source, { restructure: true }).css);
