<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /** Public routes listed in the sitemap, with their change frequency. */
    private const PAGES = [
        'home' => 'weekly',
        'our-story' => 'monthly',
        'menu' => 'weekly',
        'cakes' => 'weekly',
        'order' => 'monthly',
        'experience' => 'monthly',
        'locations' => 'monthly',
        'contact' => 'yearly',
    ];

    public function __invoke(): Response
    {
        return response()
            ->view('site.sitemap', ['pages' => self::PAGES])
            ->header('Content-Type', 'application/xml');
    }
}
