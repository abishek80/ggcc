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
                <div class="card" style="display:flex; flex-direction:column;">
                    <?php if(!empty($s['image'])): ?>
                        <div style="height:190px; overflow:hidden; border-radius:var(--radius-sm); margin-bottom:18px; border:1px solid var(--border-color);">
                            <img src="<?php echo base_url('themes/images/' . $s['image']); ?>" alt="<?php echo htmlspecialchars($s['title']); ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;">
                        </div>
                    <?php endif; ?>
                    <h3 class="card-title"><?php echo htmlspecialchars($s['title']); ?></h3>
                    <p class="card-desc"><?php echo htmlspecialchars($s['short_desc']); ?></p>

                    <div style="margin-bottom:15px; margin-top:auto;">
                        <strong style="font-size:0.8rem; text-transform:uppercase; color:var(--text-muted); letter-spacing:0.5px;">Key Applications:</strong>
                        <div class="card-tags" style="margin-top:6px;">
                            <?php foreach(array_slice($s['applications'], 0, 3) as $app): ?>
                                <span class="card-tag"><?php echo htmlspecialchars($app); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a href="<?php echo base_url('services/' . $s['slug']); ?>" class="card-link">
                        View Scope & Specifications &rarr;
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>