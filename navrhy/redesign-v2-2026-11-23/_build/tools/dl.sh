#!/bin/bash
cd "$1"
while IFS=$'\t' read -r u n; do echo "$u $n"; done < list.tsv | xargs -P 8 -n 2 sh -c '[ -s "raw/$1" ] || curl -sf --retry 3 "$0" -o "raw/$1" || echo "FAIL $0"'
ls raw | wc -l
