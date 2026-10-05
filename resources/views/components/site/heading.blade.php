@props(['text', 'tag' => 'h2', 'size' => 'l', 'delay' => 0, 'id' => null])

{{--
    Editorial heading. "|" breaks lines (each line reveals upward);
    *phrase* is set in the light weight for contrast.
--}}
@php
    $lines = collect(explode('|', $text))->map(
        fn ($line) => preg_replace('/\*(.+?)\*/u', '<em>$1</em>', e(trim($line)))
    );
@endphp

<{{ $tag }} @if ($id) id="{{ $id }}" @endif {{ $attributes->class(['display', "display--$size"]) }} data-reveal="lines" style="--d: {{ $delay }}">
    @foreach ($lines as $i => $line)
        <span class="line"><span style="--l: {{ $i }}">{!! $line !!}</span></span>
    @endforeach
</{{ $tag }}>
