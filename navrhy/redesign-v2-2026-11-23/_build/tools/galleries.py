import re, json, html, sys, os
D=sys.argv[1]
pages=['index','natery-interieru','dekoracni-sterky','natery-fasad','cisteni-fasad','natery-strech','natery-drevo-kovu','epoxidove-podlahy','mikrocement','specialni-natery','odstraneni-grafiti','pismomalirstvi','prumyslove-natery','sanace-po-zatekani','tapetovani']
out={}
for p in pages:
    h=open(f'{D}/{p}.html',encoding='utf8').read()
    # split by article cards
    cards=[]
    for m in re.finditer(r'<article class="tm-project-card"[^>]*id="([^"]+)"(.*?)</article>', h, re.S):
        cid, body = m.group(1), m.group(2)
        title = re.search(r'<h3>(.*?)</h3>', body, re.S)
        place = re.search(r'tm-project-place">(.*?)</span>', body, re.S)
        total = re.search(r'tm-project-photo-total">(.*?)</span>', body)
        desc = re.search(r'<p[^>]*>(.*?)</p>', body, re.S)
        photos=[]
        for a in re.finditer(r'<a class="photo-link[^"]*" href="([^"]+)"([^>]*)>', body):
            attrs=a.group(2)
            d=html.unescape(re.search(r'data-description="([^"]*)"',attrs).group(1)) if 'data-description' in attrs else ''
            tag=re.search(r'tm-lb-tag">([^<]*)<',d); pl=re.search(r'</svg>([^<]*)</span>',d)
            ttl=re.search(r'data-title="([^"]*)"',attrs)
            photos.append({'url':html.unescape(a.group(1)),'tag':tag.group(1) if tag else '','place':html.unescape(pl.group(1)) if pl else '','title':html.unescape(ttl.group(1)) if ttl else ''})
        # alts from imgs
        alts=[html.unescape(x) for x in re.findall(r'<img[^>]+alt="([^"]*)"', body)]
        # hidden in details?
        cards.append({'id':cid,'title':html.unescape(title.group(1).strip()) if title else '','place':html.unescape(place.group(1).strip()) if place else '','total':total.group(1) if total else '','desc':html.unescape(re.sub('<[^>]+>','',desc.group(1))).strip() if desc else '','photos':photos,'alt':alts[0] if alts else ''})
    out[p]=cards
    print(p, len(cards), sum(len(c['photos']) for c in cards), [ (c['title'],c['place'],len(c['photos']),''.join(sorted(set(x['tag'][:1] for x in c['photos'])))) for c in cards][:20])
json.dump(out,open(f'{D}/galleries.json','w'),ensure_ascii=False,indent=1)
