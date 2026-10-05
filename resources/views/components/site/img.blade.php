@props([
    'src',
    'sizes' => '100vw',
    'alt' => null,
    'eager' => false,
    'position' => null,
])

@php
    [$w, $h, $widths, $defaultAlt] = config("koba.images.$src");
    $url = fn (int $width) => asset("images/koba/$src-$width.webp");
    $srcset = collect($widths)->map(fn ($width) => $url($width)." {$width}w")->implode(', ');
    $fallback = $widths[min(1, count($widths) - 1)];
@endphp

<img
    {{ $attributes->class('img') }}
    src="{{ $url($fallback) }}"
    srcset="{{ $srcset }}"
    sizes="{{ $sizes }}"
    width="{{ $w }}"
    height="{{ $h }}"
    alt="{{ $alt ?? $defaultAlt }}"
    @if ($eager) fetchpriority="high" @else loading="lazy" @endif
    decoding="async"
    @if ($position) style="object-position: {{ $position }}" @endif
>
