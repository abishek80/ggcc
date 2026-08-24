<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; 
            <a href="<?php echo base_url('locations'); ?>">Locations</a> &rsaquo; 
            <span><?php echo htmlspecialchars($location['city_name']); ?></span>
        </div>
        <h1 class="page-title">Electrical Contracting Services in <?php echo htmlspecialchars($location['city_name']); ?></h1>
    </div>
</div>

<!-- Location Detail Content -->
<section class="section-padding">
    <div class="container">
        <div class="detail-layout">
            <!-- Main Content Area -->
            <div class="detail-main">
                <div style="margin-bottom:25px;">
                    <div>
                        <h2 style="font-size:1.8rem; color:var(--primary-dark);">GGCC Regional Engineering in <?php echo htmlspecialchars($location['city_name']); ?></h2>
                        <span style="font-size:0.85rem; color:var(--accent-gold); font-weight:700; text-transform:uppercase;"><?php echo htmlspecialchars($location['state']); ?> Industrial & Commercial Region</span>
                    </div>
                </div>

                <!-- Introduction & Industrial Context -->
                <div style="margin-bottom:35px;">
                    <h3 style="font-size:1.3rem; margin-bottom:12px; color:var(--primary-navy);">Industrial & Commercial Overview</h3>
                    <p style="color:var(--text-muted); font-size:1.05rem; line-height:1.7; margin-bottom:15px;">
                        <?php echo htmlspecialchars($location['description']); ?>
                    </p>
                    <p style="color:var(--text-muted); font-size:0.95rem; line-height:1.6;">
                        <?php echo htmlspecialchars($location['industrial_highlights']); ?>
                    </p>
                </div>

                <!-- Local Sectors & Coverage Areas -->
                <div class="grid-2" style="gap:25px; margin-bottom:35px;">
                    <div style="background:var(--bg-light); border:1px solid var(--border-color); padding:20px; border-radius:var(--radius-md);">
                        <h4 style="color:var(--primary-navy); font-size:1.1rem; margin-bottom:12px;">Sectors Served in <?php echo htmlspecialchars($location['city_name']); ?></h4>
                        <ul style="display:flex; flex-direction:column; gap:8px; font-size:0.9rem; color:var(--text-dark);">
                            <?php foreach($location['local_sectors'] as $sec): ?>
                                <li>• <?php echo htmlspecialchars($sec); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div style="background:var(--bg-light); border:1px solid var(--border-color); padding:20px; border-radius:var(--radius-md);">
                        <h4 style="color:var(--primary-navy); font-size:1.1rem; margin-bottom:12px;">Local Service Coverage Areas</h4>
                        <ul style="display:flex; flex-direction:column; gap:8px; font-size:0.9rem; color:var(--text-dark);">
                            <?php foreach($location['coverage_areas'] as $cov): ?>
                                <li>• <?php echo htmlspecialchars($cov); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Available Services Grid with Internal Links -->
                <div style="margin-bottom:40px;">
                    <h3 style="font-size:1.34rem; margin-bottom:15px; color:var(--primary-dark);">Electrical Services Offered in <?php echo htmlspecialchars($location['city_name']); ?></h3>
                    <p style="color:var(--text-muted); font-size:0.95rem; margin-bottom:20px;">
                        GGCC provides certified turnkey electrical solutions tailored to the industrial and commercial requirements of <?php echo htmlspecialchars($location['city_name']); ?>:
                    </p>

                    <div class="grid-2" style="gap:20px;">
                        <?php 
                        $location_featured_services = array_slice($services, 0, 8, true);
                        foreach($location_featured_services as $s): 
                        ?>
                            <div style="border:1px solid var(--border-color); padding:18px; border-radius:var(--radius-sm); background:#FFF;">
                                <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                                    <?php if(!empty($s['icon'])): ?><span><?php echo $s['icon']; ?></span><?php endif; ?>
                                    <h4 style="font-size:1.05rem;"><a href="<?php echo base_url('services/' . $s['slug']); ?>" style="color:var(--primary-navy);"><?php echo htmlspecialchars($s['title']); ?> in <?php echo htmlspecialchars($location['city_name']); ?></a></h4>
                                </div>
                                <p style="font-size:0.85rem; color:var(--text-muted); margin-bottom:10px;"><?php echo htmlspecialchars($s['short_desc']); ?></p>
                                <a href="<?php echo base_url('services/' . $s['slug']); ?>" style="font-size:0.8rem; font-weight:700; color:var(--accent-gold-hover);">
                                    Learn More &rarr;
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Location Specific FAQs -->
                <?php if (!empty($location['faqs'])): ?>
                    <div style="margin-bottom:40px;">
                        <h3 style="font-size:1.3rem; margin-bottom:15px; color:var(--primary-dark);"><?php echo htmlspecialchars($location['city_name']); ?> Electrical Service FAQs</h3>
                        <div class="accordion-container">
                            <?php foreach($location['faqs'] as $faq): ?>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <span><?php echo htmlspecialchars($faq['q']); ?></span>
                                        <span class="accordion-icon">▾</span>
                                    </div>
                                    <div class="accordion-content">
                                        <p><?php echo htmlspecialchars($faq['a']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Quick Regional Contact Form -->
                <div style="background:var(--bg-light); border:1px solid var(--border-color); padding:30px; border-radius:var(--radius-md);">
                    <h3 style="font-size:1.25rem; margin-bottom:15px; color:var(--primary-dark);">Enquire for Electrical Projects in <?php echo htmlspecialchars($location['city_name']); ?></h3>
                    
                    <form id="siteContactForm">
                        <input type="hidden" name="location_slug" value="<?php echo $location['slug']; ?>">
                        
                        <div class="grid-2" style="gap:15px;">
                            <div class="form-group">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" placeholder="Enter phone number" required>
                            </div>
                        </div>

                        <div class="grid-2" style="gap:15px;">
                            <div class="form-group">
                                <label class="form-label">Email ID *</label>
                                <input type="email" class="form-control" placeholder="Enter email ID" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Required Service</label>
                                <select class="form-control">
                                    <option value="">Select Service</option>
                                    <?php foreach($services as $s): ?>
                                        <option value="<?php echo $s['slug']; ?>"><?php echo htmlspecialchars($s['title']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Project Details in <?php echo htmlspecialchars($location['city_name']); ?></label>
                            <textarea class="form-control" placeholder="Briefly describe your project site location in <?php echo htmlspecialchars($location['city_name']); ?>, load requirement, or electrical scope..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit <?php echo htmlspecialchars($location['city_name']); ?> Enquiry &rarr;</button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="detail-sidebar">
                <!-- Locations Menu Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">GGCC All Locations</h4>
                    <div class="widget-links-list">
                        <?php foreach($locations as $l): ?>
                            <a href="<?php echo base_url('locations/' . $l['slug']); ?>" class="widget-link-item <?php echo ($l['slug'] == $location['slug']) ? 'active' : ''; ?>">
                                <span><?php echo htmlspecialchars($l['city_name']); ?></span>
                                <span>&rsaquo;</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Call Widget -->
                <div style="background:linear-gradient(135deg, var(--primary-dark), var(--primary-navy)); color:#FFF; padding:30px; border-radius:var(--radius-md); text-align:center;">
                    <h4 style="font-size:1.15rem; color:#FFF; margin-bottom:8px;">Need Site Engineers in <?php echo htmlspecialchars($location['city_name']); ?>?</h4>
                    <p style="font-size:0.85rem; color:rgba(255,255,255,0.8); margin-bottom:15px;">Call our main project desk for immediate consultation.</p>
                    <a href="tel:09920667756" class="btn btn-primary" style="width:100%;">Call 099206 67756</a>
                </div>
            </div>
        </div>
    </div>
</section>
