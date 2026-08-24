<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; 
            <a href="<?php echo base_url('services'); ?>">Services</a> &rsaquo; 
            <span><?php echo htmlspecialchars($service['title']); ?></span>
        </div>
        <h1 class="page-title"><?php echo htmlspecialchars($service['title']); ?></h1>
    </div>
</div>

<!-- Service Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="detail-layout">
            <!-- Main Content Area -->
            <div class="detail-main">
                <div style="display:flex; align-items:center; gap:15px; margin-bottom:20px;">
                    <?php if (!empty($service['icon'])): ?>
                        <div style="font-size:2.5rem; background:var(--bg-light); width:65px; height:65px; display:flex; align-items:center; justify-content:center; border-radius:var(--radius-sm); border:1px solid var(--border-color);">
                            <?php echo $service['icon']; ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <h2 style="font-size:1.8rem; color:#181d50;"><?php echo htmlspecialchars($service['title']); ?></h2>
                        <span style="font-size:0.85rem; color:#c91115; font-weight:700; text-transform:uppercase;">GGCC Technical Engineering Service</span>
                    </div>
                </div>

                <!-- Professional Introduction & Description -->
                <div style="margin-bottom:35px;">
                    <h3 style="font-size:1.3rem; margin-bottom:12px; color:#181d50;">Service Overview</h3>
                    <p style="color:var(--text-muted); font-size:1.05rem; line-height:1.7; margin-bottom:15px;">
                        <?php echo htmlspecialchars($service['long_desc']); ?>
                    </p>
                </div>

                <!-- Scope of Work -->
                <div style="margin-bottom:35px; background:var(--bg-light); padding:30px; border-radius:var(--radius-md); border:1px solid var(--border-color);">
                    <h3 style="font-size:1.3rem; margin-bottom:15px; color:#c91115;">Comprehensive Scope of Work</h3>
                    <ul style="display:flex; flex-direction:column; gap:12px; color:var(--text-dark);">
                        <?php foreach($service['scope_of_work'] as $index => $scope): ?>
                            <li style="display:flex; align-items:flex-start; gap:10px; font-size:0.95rem;">
                                <span style="background:#c91115; color:#FFFFFF; font-weight:800; font-size:0.75rem; width:22px; height:22px; border-radius:50%; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px;">
                                    <?php echo $index + 1; ?>
                                </span>
                                <span><?php echo htmlspecialchars($scope); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Key Benefits & Applications -->
                <div class="grid-2" style="gap:25px; margin-bottom:35px;">
                    <div style="border:1px solid var(--border-color); padding:20px; border-radius:var(--radius-md);">
                        <h4 style="color:var(--primary-navy); font-size:1.1rem; margin-bottom:12px;">Technical Benefits</h4>
                        <ul style="display:flex; flex-direction:column; gap:8px; font-size:0.9rem; color:var(--text-muted);">
                            <?php foreach($service['benefits'] as $b): ?>
                                <li>✓ <?php echo htmlspecialchars($b); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div style="border:1px solid var(--border-color); padding:20px; border-radius:var(--radius-md);">
                        <h4 style="color:var(--primary-navy); font-size:1.1rem; margin-bottom:12px;">Application Sectors</h4>
                        <ul style="display:flex; flex-direction:column; gap:8px; font-size:0.9rem; color:var(--text-muted);">
                            <?php foreach($service['applications'] as $app): ?>
                                <li>✓ <?php echo htmlspecialchars($app); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Why Choose GGCC for this Service -->
                <div style="margin-bottom:35px;">
                    <h3 style="font-size:1.3rem; margin-bottom:12px; color:var(--primary-dark);">Why Choose GGCC for <?php echo htmlspecialchars($service['title']); ?></h3>
                    <p style="color:var(--text-muted); font-size:0.95rem; line-height:1.6;">
                        George General Construction Company (GGCC) brings extensive engineering expertise, Class-1 license compliance, and proven safety records across India. Our certified site engineers manage every project phase with strict adherence to IS standards, National Building Code (NBC), and Central Electricity Authority (CEA) safety guidelines.
                    </p>
                </div>

                <!-- Service Locations Capability -->
                <div style="margin-bottom:40px; background:var(--primary-dark); color:#FFF; padding:30px; border-radius:var(--radius-md);">
                    <h4 style="color:var(--accent-gold); font-size:1.1rem; margin-bottom:10px;">Service Availability Across India</h4>
                    <p style="font-size:0.9rem; color:rgba(255,255,255,0.85); margin-bottom:15px;">
                        GGCC provides <?php echo htmlspecialchars($service['title']); ?> across 13 major locations:
                    </p>
                    <div style="display:flex; flex-wrap:wrap; gap:8px;">
                        <?php foreach($locations as $loc): ?>
                            <a href="<?php echo base_url('locations/' . $loc['slug']); ?>" style="font-size:0.8rem; background:rgba(255,255,255,0.1); color:#FFF; padding:4px 10px; border-radius:4px;">
                                <?php echo htmlspecialchars($loc['city_name']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- FAQ Section -->
                <?php if (!empty($service['faqs'])): ?>
                    <div style="margin-bottom:40px;">
                        <h3 style="font-size:1.3rem; margin-bottom:15px; color:var(--primary-dark);">Frequently Asked Questions</h3>
                        <div class="accordion-container">
                            <?php foreach($service['faqs'] as $faq): ?>
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

                <!-- Quick Enquiry Form -->
                <div style="background:var(--bg-light); border:1px solid var(--border-color); padding:30px; border-radius:var(--radius-md);">
                    <h3 style="font-size:1.25rem; margin-bottom:15px; color:var(--primary-dark);">Request Technical Proposal for <?php echo htmlspecialchars($service['title']); ?></h3>
                    
                    <form id="siteContactForm">
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
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-control" placeholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Project Location</label>
                                <select class="form-control">
                                    <option value="">Select Location</option>
                                    <?php foreach($locations as $l): ?>
                                        <option value="<?php echo $l['slug']; ?>"><?php echo htmlspecialchars($l['city_name']); ?> (<?php echo $l['state']; ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Project Details / Scope Requirements</label>
                            <textarea class="form-control" placeholder="Briefly describe your project, site location, load requirements, or timeline..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Business Enquiry &rarr;</button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="detail-sidebar">
                <!-- All Services Widget -->
                <div class="sidebar-widget">
                    <h4 class="widget-title">All Electrical Services</h4>
                    <div class="widget-links-list">
                        <?php foreach($services as $s): ?>
                            <a href="<?php echo base_url('services/' . $s['slug']); ?>" class="widget-link-item <?php echo ($s['slug'] == $service['slug']) ? 'active' : ''; ?>">
                                <span><?php echo htmlspecialchars($s['title']); ?></span>
                                <span>&rsaquo;</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Contact CTA Widget -->
                <div style="background:linear-gradient(135deg, var(--primary-dark), var(--primary-navy)); color:#FFF; padding:30px; border-radius:var(--radius-md); text-align:center;">
                    <h4 style="font-size:1.15rem; color:#FFF; margin-bottom:8px;">Have Questions?</h4>
                    <p style="font-size:0.85rem; color:rgba(255,255,255,0.8); margin-bottom:15px;">Speak directly with our senior electrical project engineers.</p>
                    <a href="tel:09920667756" class="btn btn-primary" style="width:100%;">Call 099206 67756</a>
                    <a href="mailto:info@ggcc.org.in" style="display:block; margin-top:12px; font-size:0.85rem; color:var(--accent-gold);">Email: info@ggcc.org.in</a>
                </div>
            </div>
        </div>
    </div>
</section>
