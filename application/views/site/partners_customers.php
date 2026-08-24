<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; <span>Partners & Customers</span>
        </div>
        <h1 class="page-title">Partners & Customers</h1>
    </div>
</div>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="section-title-wrap">
            <div class="section-subtitle">Collaborations</div>
            <h2 class="section-title">Industry Partners & Business Relationships</h2>
            <p class="section-desc">GGCC collaborates with leading equipment manufacturers, switchgear suppliers, utility boards, and industrial enterprise clients across India.</p>
        </div>

        <!-- Business Engagement Models -->
        <div class="grid-3" style="margin-bottom:60px;">
            <div style="background:#FFF; padding:30px; border-radius:var(--radius-md); border:1px solid var(--border-color); text-align:center;">
                <h3 style="font-size:1.25rem; margin-bottom:8px;">Turnkey EPC Contractors</h3>
                <p style="font-size:0.9rem; color:var(--text-muted);">Serving as trusted electrical EPC partners for general civil builders, industrial developers, and project consultants.</p>
            </div>

            <div style="background:#FFF; padding:30px; border-radius:var(--radius-md); border:1px solid var(--border-color); text-align:center;">
                <h3 style="font-size:1.25rem; margin-bottom:8px;">OEM & Equipment Suppliers</h3>
                <p style="font-size:0.9rem; color:var(--text-muted);">Partnering with certified switchgear, transformer, cable, and panel component original equipment manufacturers (OEMs).</p>
            </div>

            <div style="background:#FFF; padding:30px; border-radius:var(--radius-md); border:1px solid var(--border-color); text-align:center;">
                <h3 style="font-size:1.25rem; margin-bottom:8px;">Utility & Inspectorate Liaison</h3>
                <p style="font-size:0.9rem; color:var(--text-muted);">Managing official liaison and sanction load clearances with State Electricity Distribution Companies and CEIG.</p>
            </div>
        </div>

        <!-- Partner & Customer Placeholder Showcase -->
        <div class="section-title-wrap">
            <div class="section-subtitle">Client Network</div>
            <h2 class="section-title">Enterprise Client Showcase</h2>
            <p class="section-desc">Placeholder structure ready for displaying client partner logos and project engagement profiles.</p>
        </div>

        <div class="grid-4" style="margin-bottom:40px;">
            <?php for($i = 1; $i <= 8; $i++): ?>
                <div style="background:#FFF; border:2px dashed var(--border-color); border-radius:var(--radius-md); height:120px; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:15px; text-align:center;">
                    <span style="font-size:0.8rem; font-weight:700; color:var(--text-muted);">Client Partner Badge #<?php echo $i; ?></span>
                    <span style="font-size:0.7rem; color:var(--text-light);">Logo Placeholder</span>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Industries Covered -->
        <div style="background:linear-gradient(135deg, var(--primary-dark), var(--primary-navy)); color:#FFF; padding:30px; border-radius:var(--radius-md); text-align:center;">
            <h3 style="color:var(--accent-gold); font-size:1.5rem; margin-bottom:15px;">Industries We Serve</h3>
            <p style="color:rgba(255,255,255,0.85); max-width:800px; margin:0 auto 25px auto; font-size:1rem; line-height:1.6;">
                Our electrical contracting expertise spans Automotive OEMs, Chemical & Process Refineries, Pharmaceutical API Plants, Textile Mills, Engineering Foundries, Commercial Skyscrapers, IT Parks, and Public Municipal Infrastructure.
            </p>
            <a href="<?php echo base_url('contact'); ?>" class="btn btn-primary">Become a GGCC Client Partner</a>
        </div>
    </div>
</section>
