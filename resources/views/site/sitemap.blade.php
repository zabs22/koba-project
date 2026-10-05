{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($pages as $route => $frequency)
    <url>
        <loc>{{ route($route) }}</loc>
        <changefreq>{{ $frequency }}</changefreq>
        <priority>{{ $route === 'home' ? '1.0' : '0.8' }}</priority>
    </url>
@endforeach
</urlset>
