#!/bin/bash
f="$1"; n=$(basename "$f"); o=dl/out
[ -s "$o/$n-t.webp" ] || vips thumbnail "$f" "$o/$n-t.webp[Q=72,strip]" 720 --height 3000 --size down 2>/dev/null
[ -s "$o/$n-f.webp" ] || vips thumbnail "$f" "$o/$n-f.webp[Q=74,strip]" 2048 --height 2048 --size down 2>/dev/null
