<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; <span>Services</span>
        </div>
        <h1 class="page-title">Electrical Contracting & Installation Services</h1>
    </div>
</div>

<!-- Main Services Listing -->
<section class="section-padding">
    <div class="container">
        <div class="section-title-wrap">
            <div class="section-subtitle">Our Capabilities</div>
            <h2 class="section-title">16 Specialised Electrical Engineering Services</h2>
            <p class="section-desc">GGCC delivers complete turnkey electrical solutions for industrial manufacturing plants, commercial towers, infrastructure corridors, and public utility projects across India.</p>
        </div>

        <div class="grid-3">
            <?php foreach($services as $s): ?>
                <div class="card">
                    <?php if(!empty($s['icon'])): ?><div class="card-icon-box"><?php echo $s['icon']; ?></div><?php endif; ?>
                    <h3 class="card-title"><?php echo htmlspecialchars($s['title']); ?></h3>
                    <p class="card-desc"><?php echo htmlspecialchars($s['short_desc']); ?></p>

                    <div style="margin-bottom:15px;">
                        <strong style="font-size:0.8rem; text-transform:uppercase; color:var(--text-muted); letter-spacing:0.5px;">Key Applications:</strong>
                        <div class="card-tags" style="margin-top:6px;">
                            <?php foreach(array_slice($s['applications'], 0, 3) as $app): ?>
                                <span class="card-tag"><?php echo htmlspecialchars($app); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a href="<?php echo base_url('services/' . $s['slug']); ?>" class="card-link" style="margin-top:auto;">
                        View Scope & Specifications &rarr;
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
            <h2>Need Custom Electrical Engineering Solutions?</h2>
            <p>Our licensed electrical engineers provide tailored technical proposals, load designs, and cost estimations for industrial and commercial projects.</p>
            <a href="<?php echo base_url('contact'); ?>" class="btn btn-primary">Contact GGCC Engineering Team</a>
        </div>
    </div>
</section>
