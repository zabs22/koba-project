@props(['variant' => 'default', 'title' => 'KOBA Patisserie and Bakery'])

{{--
    KOBA lockup — vector rebuild of the official logo (KOBA-Logo-02-02-1.png).
    Mark and wordmark are one unit and always scale together.
    Approved colourways (Brand Guideline p.52–57):
      default → sand mark, white glyph, green wordmark   (light backgrounds)
      light   → white mark, green glyph, white wordmark  (dark green backgrounds)
      sand    → sand mark, green glyph, sand wordmark    (dark green backgrounds)
    Swap in the official SVG here if the agency supplies one.
--}}
<svg {{ $attributes->class(['logo', 'logo--'.$variant]) }} viewBox="0 0 1900 650" role="img" aria-label="{{ $title }}" xmlns="http://www.w3.org/2000/svg">
    <rect class="logo__mark" x="0" y="0" width="458" height="650" />
    <g class="logo__glyph" fill="none" stroke-width="30" stroke-linecap="round" stroke-linejoin="round">
        <path d="M82 58V100Q84 132 126 150" />
        <path d="M206 82L62 212V414" />
        <path d="M206 82V292" />
        <path d="M252 84V292" />
        <path d="M252 84L402 218V414" />
        <path d="M108 270L230 380L352 270" />
        <path d="M112 390L230 494L348 390" />
        <path d="M112 496L230 600L348 496" />
        <path d="M230 380V650" stroke-linecap="butt" />
    </g>
    <g class="logo__word" fill="none" stroke-width="60" stroke-linecap="round" stroke-linejoin="round">
        <path d="M570 140V428M770 140L600 300M652 251L778 428" />
        <circle cx="1003" cy="283" r="147" />
        <path d="M1262 425V140H1395C1450 140 1470 172 1470 204C1470 240 1446 270 1395 270H1262M1395 270H1418C1468 270 1488 308 1488 347C1488 392 1460 425 1415 425H1262" />
        <path d="M1600 428L1735 140L1868 428M1665 345H1805" />
    </g>
    <text class="logo__tag" x="540" y="548" font-size="64" font-weight="500" textLength="1352" lengthAdjust="spacing">PATISSERIE AND BAKERY</text>
</svg>
