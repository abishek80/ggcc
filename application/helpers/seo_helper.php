<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_seo_config')) {
    function get_seo_config($key, $default = '') {
        $CI =& get_instance();
        $CI->config->load('seo', TRUE, TRUE);
        $val = $CI->config->item($key, 'seo');
        return ($val !== NULL) ? $val : $default;
    }
}

if (!function_exists('render_seo_meta')) {
    function render_seo_meta($data = array()) {
        $site_name = get_seo_config('seo_site_name', 'George General Construction Company (GGCC)');
        $title = !empty($data['meta_title']) ? $data['meta_title'] : (!empty($data['page_title']) ? $data['page_title'] : get_seo_config('seo_default_title'));
        $description = !empty($data['meta_description']) ? $data['meta_description'] : get_seo_config('seo_default_description');
        $canonical = !empty($data['canonical_url']) ? $data['canonical_url'] : base_url();
        $og_image = !empty($data['og_image']) ? $data['og_image'] : get_seo_config('seo_default_og_image');
        $robots = !empty($data['meta_robots']) ? $data['meta_robots'] : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';

        $html  = '    <title>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</title>' . "\n";
        $html .= '    <meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta name="robots" content="' . htmlspecialchars($robots, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta name="googlebot" content="' . htmlspecialchars($robots, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <link rel="canonical" href="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . '">' . "\n\n";

        // Open Graph Meta
        $html .= '    <!-- Open Graph Metadata -->' . "\n";
        $html .= '    <meta property="og:title" content="' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:type" content="' . (!empty($data['og_type']) ? htmlspecialchars($data['og_type']) : 'website') . '">' . "\n";
        $html .= '    <meta property="og:url" content="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:site_name" content="' . htmlspecialchars($site_name, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:image" content="' . htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:image:secure_url" content="' . htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta property="og:locale" content="en_US">' . "\n\n";

        // Twitter/X Cards
        $html .= '    <!-- Twitter / X Card Metadata -->' . "\n";
        $html .= '    <meta name="twitter:card" content="summary_large_image">' . "\n";
        $html .= '    <meta name="twitter:title" content="' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta name="twitter:description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '">' . "\n";
        $html .= '    <meta name="twitter:image" content="' . htmlspecialchars($og_image, ENT_QUOTES, 'UTF-8') . '">' . "\n";

        return $html;
    }
}

if (!function_exists('generate_json_ld_schemas')) {
    function generate_json_ld_schemas($data = array()) {
        $schemas = array();

        // 1. Organization & ElectricalContractor Schema
        $organization = array(
            '@context' => 'https://schema.org',
            '@type' => 'ElectricalContractor',
            '@id' => base_url('#organization'),
            'name' => 'George General Construction Company',
            'alternateName' => 'GGCC',
            'legalName' => 'George General Construction Co',
            'url' => base_url(),
            'logo' => array(
                '@type' => 'ImageObject',
                'url' => base_url('themes/images/ggcc-logo.png')
            ),
            'image' => base_url('themes/images/hpcl_petrol_pump_lighting.jpg'),
            'telephone' => get_seo_config('seo_contact_phone', '+919920667756'),
            'email' => get_seo_config('seo_contact_email', 'info@ggcc.org.in'),
            'priceRange' => '$$$',
            'address' => get_seo_config('seo_address'),
            'areaServed' => get_seo_config('seo_service_locations'),
            'knowsAbout' => array(
                'Electrical Contracting',
                'Industrial Electrical Installation',
                'Commercial Electrical Installation',
                'HPCL Petrol Pump Electrification',
                'HT & LT Cable Laying',
                'LT Control Panel Fabrication & Installation',
                'Annual Maintenance Contract (AMC)',
                'Flameproof Electrical Installation',
                'APFC Panel & Power Factor Correction',
                'Street & High Mast Lighting'
            )
        );
        $schemas[] = $organization;

        // 2. WebSite Schema
        $website = array(
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => base_url('#website'),
            'url' => base_url(),
            'name' => 'George General Construction Company (GGCC)',
            'description' => get_seo_config('seo_default_description'),
            'publisher' => array('@id' => base_url('#organization'))
        );
        $schemas[] = $website;

        // 3. BreadcrumbList Schema (if provided)
        if (!empty($data['breadcrumbs']) && is_array($data['breadcrumbs'])) {
            $itemListElement = array();
            $position = 1;
            foreach ($data['breadcrumbs'] as $crumb) {
                $itemListElement[] = array(
                    '@type' => 'ListItem',
                    'position' => $position,
                    'name' => $crumb['name'],
                    'item' => $crumb['url']
                );
                $position++;
            }
            $schemas[] = array(
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => $itemListElement
            );
        }

        // 4. Service Schema (if on service detail page)
        if (!empty($data['service']) && is_array($data['service'])) {
            $svc = $data['service'];
            $service_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $svc['title'],
                'serviceType' => 'Electrical Contracting & Engineering',
                'provider' => array('@id' => base_url('#organization')),
                'description' => !empty($svc['meta_description']) ? $svc['meta_description'] : $svc['short_desc'],
                'areaServed' => get_seo_config('seo_service_locations'),
                'url' => base_url('services/' . $svc['slug'])
            );
            if (!empty($svc['scope_of_work']) && is_array($svc['scope_of_work'])) {
                $service_schema['hasOfferCatalog'] = array(
                    '@type' => 'OfferCatalog',
                    'name' => $svc['title'] . ' Scope of Work',
                    'itemListElement' => array_map(function($item) {
                        return array(
                            '@type' => 'Offer',
                            'itemOffered' => array(
                                '@type' => 'Service',
                                'name' => $item
                            )
                        );
                    }, $svc['scope_of_work'])
                );
            }
            $schemas[] = $service_schema;

            // FAQ Schema if service has FAQs
            if (!empty($svc['faqs']) && is_array($svc['faqs'])) {
                $mainEntity = array();
                foreach ($svc['faqs'] as $faq) {
                    $mainEntity[] = array(
                        '@type' => 'Question',
                        'name' => $faq['q'],
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => $faq['a']
                        )
                    );
                }
                $schemas[] = array(
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $mainEntity
                );
            }
        }

        // 5. LocalBusiness / Location Schema (if on location detail page)
        if (!empty($data['location']) && is_array($data['location'])) {
            $loc = $data['location'];
            $loc_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'ElectricalContractor',
                'name' => 'GGCC Electrical Contractor ' . $loc['city_name'],
                'url' => base_url('locations/' . $loc['slug']),
                'telephone' => get_seo_config('seo_contact_phone'),
                'email' => get_seo_config('seo_contact_email'),
                'description' => $loc['meta_description'],
                'address' => array(
                    '@type' => 'PostalAddress',
                    'addressLocality' => $loc['city_name'],
                    'addressRegion' => $loc['state'],
                    'addressCountry' => 'IN'
                ),
                'parentOrganization' => array('@id' => base_url('#organization'))
            );
            $schemas[] = $loc_schema;

            // FAQ Schema if location has FAQs
            if (!empty($loc['faqs']) && is_array($loc['faqs'])) {
                $mainEntity = array();
                foreach ($loc['faqs'] as $faq) {
                    $mainEntity[] = array(
                        '@type' => 'Question',
                        'name' => $faq['q'],
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => $faq['a']
                        )
                    );
                }
                $schemas[] = array(
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $mainEntity
                );
            }
        }

        // Render all JSON-LD blocks
        $output = '';
        foreach ($schemas as $schema) {
            $output .= '    <script type="application/ld+json">' . "\n";
            $output .= json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
            $output .= '    </script>' . "\n";
        }

        return $output;
    }
}
