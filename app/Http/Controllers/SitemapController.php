<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
use App\Models\Tutorial;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = url('/');
        $now = now()->toAtomString();

        $staticUrls = [
            ['loc' => $baseUrl, 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => route('landing.features'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('landing.pricing'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('restaurant_signup'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('landing.about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('landing.tutorials'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('landing.privacy'), 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('landing.terms'), 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('landing.refund_policy'), 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('landing.cookie_policy'), 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('landing.gdpr'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        $dynamicUrls = [];

        try {
            if (Schema::hasTable('tutorials')) {
                $tutorials = Tutorial::latest()->get();
                foreach ($tutorials as $tutorial) {
                    if (!empty($tutorial->slug)) {
                        $dynamicUrls[] = [
                            'loc' => route('landing.tutorial_detail', $tutorial->slug),
                            'priority' => '0.7',
                            'changefreq' => 'weekly',
                            'lastmod' => $tutorial->updated_at ? $tutorial->updated_at->toAtomString() : $now,
                        ];
                    }
                }
            }
        } catch (\Throwable $e) {
            // Silently fallback to static URLs if table does not exist
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($staticUrls as $url) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $now . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        foreach ($dynamicUrls as $url) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
