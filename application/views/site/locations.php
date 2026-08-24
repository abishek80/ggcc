<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; <span>Locations</span>
        </div>
        <h1 class="page-title">Service Locations Across India</h1>
    </div>
</div>

<!-- All Locations Directory -->
<section class="section-padding">
    <div class="container">
        <div class="section-title-wrap">
            <div class="section-subtitle">Multi-Location Service Capability</div>
            <h2 class="section-title">GGCC Electrical Contracting Hubs</h2>
            <p class="section-desc">GGCC operates dedicated engineering teams and site management across 13 major industrial and commercial hubs in India.</p>
        </div>

        <div class="grid-3">
            <?php foreach($locations as $loc): ?>
                <div class="card">
                    <h3 class="card-title"><?php echo htmlspecialchars($loc['city_name']); ?>, <?php echo htmlspecialchars($loc['state']); ?></h3>
                    <p class="card-desc"><?php echo htmlspecialchars($loc['industrial_highlights']); ?></p>

                    <div style="margin-bottom:15px;">
                        <strong style="font-size:0.8rem; text-transform:uppercase; color:var(--text-muted);">Local Key Clusters:</strong>
                        <div class="card-tags" style="margin-top:6px;">
                            <?php foreach(array_slice($loc['local_sectors'], 0, 3) as $sec): ?>
                                <span class="card-tag"><?php echo htmlspecialchars($sec); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a href="<?php echo base_url('locations/' . $loc['slug']); ?>" class="card-link" style="margin-top:auto;">
                        Explore <?php echo htmlspecialchars($loc['city_name']); ?> Electrical Services &rarr;
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="cta-banner">
            <h2>Planning an Industrial or Commercial Electrical Project?</h2>
            <p>Connect with GGCC regional engineers for site surveys, load designs, and localized project estimates across all 13 locations.</p>
            <a href="<?php echo base_url('contact'); ?>" class="btn btn-primary">Enquire for Your Project Location</a>
        </div>
    </div>
</section>
