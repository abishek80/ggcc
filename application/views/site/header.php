<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($meta_title) ? htmlspecialchars($meta_title) : 'GGCC — Electrical Contracting Company'; ?></title>
    <meta name="description" content="<?php echo isset($meta_description) ? htmlspecialchars($meta_description) : 'George General Construction Company (GGCC) provides electrical contracting and installation services across India.'; ?>">
    <link rel="canonical" href="<?php echo isset($canonical_url) ? $canonical_url : base_url(); ?>">
    
    <!-- Open Graph Metadata -->
    <meta property="og:title" content="<?php echo isset($meta_title) ? htmlspecialchars($meta_title) : 'GGCC'; ?>">
    <meta property="og:description" content="<?php echo isset($meta_description) ? htmlspecialchars($meta_description) : 'Turnkey Electrical Contracting & Installation Services across India.'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo isset($canonical_url) ? $canonical_url : base_url(); ?>">
    <meta property="og:site_name" content="George General Construction Company (GGCC)">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('themes/images/fav-icon.png'); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('themes/images/fav-icon.png'); ?>">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('themes/site/css/style.css'); ?>">

    <!-- JSON-LD Structured Data (Schema Markup) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ElectricalContractor",
      "name": "George General Construction Company",
      "alternateName": "GGCC",
      "legalName": "George General Construction Co",
      "url": "<?php echo base_url(); ?>",
      "telephone": "+919920667756",
      "email": "info@ggcc.org.in",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Suyog Samuha CHS Ltd, 9, Plot No. 41 to 44, Sector 8, Sanpada",
        "addressLocality": "Navi Mumbai",
        "addressRegion": "Maharashtra",
        "postalCode": "400705",
        "addressCountry": "IN"
      },
      "areaServed": [
        "Vashi", "Gwalior", "Madurai", "Coimbatore", "Tiruchirappalli", 
        "Bangalore", "Indore", "Tirunelveli", "Mumbai", "Nanded", "Chennai", "Bhopal", "Kochi"
      ],
      "knowsAbout": [
        "Electrical Contracting", "Industrial Electrical Installation", "Commercial Electrical Installation", 
        "HT & LT Cable Laying", "Electrical Panels", "Annual Maintenance Contract", "Flameproof Electrical Installation"
      ]
    }
    </script>
</head>
<body>

    <!-- Top Contact Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div class="top-info">
                    <span><strong>Call Us:</strong> <a href="tel:09920667756" style="color:#FFFFFF; font-weight:700;">099206 67756</a></span>
                    <span><strong>Email:</strong> <a href="mailto:info@ggcc.org.in">info@ggcc.org.in</a></span>
                </div>
                <div class="top-locations">
                    Serving 13 Locations Across India (Mumbai, Chennai, Bangalore, Kochi & More)
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
                <div style="display:flex; align-items:center; gap:15px;">
                    <a href="<?php echo base_url('admin'); ?>" target="_blank" class="btn btn-primary" style="padding: 10px 20px; font-size: 0.9rem;">Login</a>
                    <button class="mobile-toggle" id="mobileToggle" aria-label="Open Navigation Menu">☰</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer Overlay -->
    <div class="mobile-nav-overlay" id="mobileOverlay"></div>
    <div class="mobile-nav-drawer" id="mobileDrawer">
        <div class="mobile-drawer-header" style="display:flex; align-items:center; gap:10px;">
            <img src="<?php echo base_url('themes/images/ggcc-logo.png'); ?>" alt="GGCC Logo" style="height:32px; width:auto; object-fit:contain;">
            <button class="close-drawer-btn" id="closeDrawer">✕</button>
        </div>
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
    </div>
