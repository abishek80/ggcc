<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$seo_vars = array(
    'meta_title' => isset($meta_title) ? $meta_title : null,
    'page_title' => isset($page_title) ? $page_title : null,
    'meta_description' => isset($meta_description) ? $meta_description : null,
    'canonical_url' => isset($canonical_url) ? $canonical_url : null,
    'breadcrumbs' => isset($breadcrumbs) ? $breadcrumbs : null,
    'service' => isset($service) ? $service : null,
    'location' => isset($location) ? $location : null
);
echo render_seo_meta($seo_vars);
?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('themes/images/fav-icon.png'); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('themes/images/fav-icon.png'); ?>">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('themes/site/css/style.css'); ?>">

    <!-- Dynamic JSON-LD Structured Data -->
    <?php echo generate_json_ld_schemas($seo_vars); ?>
</head>
<body>

    <!-- Top Contact Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-info">
                    <span><strong>Call Us:</strong> <a href="tel:9920667756" style="color:#FFFFFF; font-weight:700;">99206 67756</a></span>
                    <span><strong>Email:</strong> <a href="mailto:info@ggcc.org.in">info@ggcc.org.in</a></span>
                </div>
                <div class="top-locations">
                    Serving 5 States Across India (Maharashtra, Madhya Pradesh, Tamil Nadu, Karnataka, Kerala)
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="header-main">
        <div class="container">
            <div class="nav-wrapper">
                <!-- Brand Logo -->
                <a href="<?php echo base_url(); ?>" class="brand-logo">
                    <img src="<?php echo base_url('themes/images/ggcc-logo.png'); ?>" alt="GGCC Logo" class="brand-logo-img">
                </a>

                <!-- Desktop Menu -->
                <nav class="nav-menu">
                    <a href="<?php echo base_url(); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'home') ? 'active' : ''; ?>">Home</a>
                    <a href="<?php echo base_url('about'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'about') ? 'active' : ''; ?>">About</a>
                    
                    <!-- Services Dropdown -->
                    <div class="nav-item-dropdown">
                        <a href="<?php echo base_url('services'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'services') ? 'active' : ''; ?>">
                            Services
                        </a>
                        <div class="dropdown-menu">
                            <?php if (isset($services_menu) && is_array($services_menu)): ?>
                                <?php foreach($services_menu as $s): ?>
                                    <a href="<?php echo base_url('services/' . $s['slug']); ?>" class="dropdown-item">
                                        <?php echo htmlspecialchars($s['title']); ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <a href="<?php echo base_url('gallery'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'gallery') ? 'active' : ''; ?>">Gallery</a>
                    <a href="<?php echo base_url('partners-customers'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'partners') ? 'active' : ''; ?>">Partners & Clients</a>
                    <a href="<?php echo base_url('locations'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'locations') ? 'active' : ''; ?>">Locations</a>
                    <a href="<?php echo base_url('contact'); ?>" class="nav-link <?php echo (isset($current_page) && $current_page == 'contact') ? 'active' : ''; ?>">Contact</a>
                </nav>

                <!-- CTA & Mobile Toggle -->
                <div class="header-cta-group">
                    <a href="https://play.google.com/store/apps/details?id=in.org.ggcc.mobile" target="_blank" rel="noopener noreferrer" class="header-app-btn" title="Download GGCC Mobile App on Google Play Store">
                        <svg width="15" height="15" viewBox="0 0 512 512" fill="none">
                            <path d="M48.7 15.1C44.4 19.6 42 26.6 42 35.8v440.4c0 9.2 2.4 16.2 6.7 20.7l1.1 1.1L274 273.8v-5.6L49.8 14l-1.1 1.1z" fill="#00e5ff"/>
                            <path d="M350.7 350.5l-76.7-76.7v-5.6l76.7-76.7 1.8 1 90.7 51.5c25.9 14.7 25.9 38.7 0 53.5l-90.7 51.5-1.8 1z" fill="#ffca28"/>
                            <path d="M352.5 349.5L274 271 48.7 496.3c8.6 9.1 22.7 10.3 38.7 1.2l265.1-148z" fill="#ff3d00"/>
                            <path d="M352.5 162.5L87.4 14.5C71.4 5.4 57.3 6.6 48.7 15.7L274 241l78.5-78.5z" fill="#00e676"/>
                        </svg>
                        <span class="d-none d-md-block">Play Store</span>
                    </a>
                    <a href="<?php echo base_url('admin'); ?>" target="_blank" class="header-app-btn" title="Web Application Portal Login">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                        <span class="d-none d-md-block">Web App</span>
                    </a>
                    <button class="mobile-toggle" id="mobileToggle" aria-label="Open Navigation Menu">☰</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer Overlay -->
    <div class="mobile-nav-overlay" id="mobileOverlay"></div>
    <div class="mobile-nav-drawer" id="mobileDrawer">
        <div class="mobile-drawer-header">
            <img src="<?php echo base_url('themes/images/ggcc-logo.png'); ?>" alt="GGCC Logo" style="height:32px; width:auto; object-fit:contain;">
            <button class="close-drawer-btn" id="closeDrawer" aria-label="Close Navigation">✕</button>
        </div>
        <div class="mobile-drawer-body">
            <div class="mobile-drawer-links">
                <a href="<?php echo base_url(); ?>">Home</a>
                <a href="<?php echo base_url('about'); ?>">About Us</a>
                <a href="<?php echo base_url('services'); ?>">Our Services</a>
                <a href="<?php echo base_url('gallery'); ?>">Gallery & Awards</a>
                <a href="<?php echo base_url('partners-customers'); ?>">Partners & Customers</a>
                <a href="<?php echo base_url('locations'); ?>">Service Locations</a>
                <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                <a href="<?php echo base_url('terms-and-conditions'); ?>">Terms & Conditions</a>
                <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a>
            </div>
            <div class="mobile-drawer-apps">
                <div class="mobile-drawer-apps-title">Our Applications</div>
                <div class="mobile-drawer-apps-list">
                    <a href="https://play.google.com/store/apps/details?id=in.org.ggcc.mobile" target="_blank" rel="noopener noreferrer" class="mobile-app-link" style="margin-bottom: 10px;">
                        <div class="mobile-app-icon mobile-app-icon-play">
                            <svg width="20" height="20" viewBox="0 0 512 512" fill="none">
                                <path d="M48.7 15.1C44.4 19.6 42 26.6 42 35.8v440.4c0 9.2 2.4 16.2 6.7 20.7l1.1 1.1L274 273.8v-5.6L49.8 14l-1.1 1.1z" fill="#00e5ff"/>
                                <path d="M350.7 350.5l-76.7-76.7v-5.6l76.7-76.7 1.8 1 90.7 51.5c25.9 14.7 25.9 38.7 0 53.5l-90.7 51.5-1.8 1z" fill="#ffca28"/>
                                <path d="M352.5 349.5L274 271 48.7 496.3c8.6 9.1 22.7 10.3 38.7 1.2l265.1-148z" fill="#ff3d00"/>
                                <path d="M352.5 162.5L87.4 14.5C71.4 5.4 57.3 6.6 48.7 15.7L274 241l78.5-78.5z" fill="#00e676"/>
                            </svg>
                        </div>
                        <div>
                            <strong class="mobile-app-title">Mobile Application</strong>
                            <span class="mobile-app-desc">Get it on Google Play</span>
                        </div>
                    </a>
                    <a href="<?php echo base_url('admin'); ?>" target="_blank" class="mobile-app-link">
                        <div class="mobile-app-icon mobile-app-icon-web">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                        </div>
                        <div>
                            <strong class="mobile-app-title">Web Application</strong>
                            <span class="mobile-app-desc">ERP Portal & Admin Login</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
