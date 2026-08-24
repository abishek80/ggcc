<!-- Breadcrumb Banner -->
<div class="breadcrumb-banner">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="<?php echo base_url(); ?>">Home</a> &rsaquo; <span>Contact Us</span>
        </div>
        <h1 class="page-title">Contact George General Construction Company</h1>
    </div>
</div>

<!-- Main Contact Section -->
<section class="section-padding">
    <div class="container">
        <div class="grid-2" style="gap:50px; align-items:start;">
            <!-- Contact Information Card -->
            <div class="contact-info-card" style="background:linear-gradient(135deg, #c91115, #181d50);">
                <div>
                    <span style="background:rgba(255,255,255,0.2); color:#FFFFFF; border:1px solid rgba(255,255,255,0.35); font-size:0.8rem; font-weight:700; padding:4px 12px; border-radius:50px; text-transform:uppercase;">Main Branch Office</span>
                    <h2 style="color:#FFF; font-size:1.8rem; margin-top:10px;">George General Construction Company (GGCC)</h2>
                    <p style="color:rgba(255,255,255,0.85); font-size:0.95rem; margin-top:5px;">Licensed Electrical Contracting & Infrastructure Firm</p>
                </div>

                <div class="contact-info-item">
                    <div>
                        <strong style="color:#ffeb3b; display:block; margin-bottom:4px; font-size:0.95rem; text-transform:uppercase; letter-spacing:0.5px;">Main Branch Address</strong>
                        <p style="color:#FFFFFF; line-height:1.6; font-size:0.95rem;">
                            Suyog Samuha CHS Ltd,<br>
                            9, Plot No. 41 to 44,<br>
                            Sector 8, Sanpada,<br>
                            Navi Mumbai, Maharashtra 400705
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div>
                        <strong style="color:#ffeb3b; display:block; margin-bottom:4px; font-size:0.95rem; text-transform:uppercase; letter-spacing:0.5px;">Phone / Project Enquiry</strong>
                        <p style="color:#FFF; font-size:1.2rem; font-weight:800;">
                            <a href="tel:09920667756" style="color:#FFF; text-decoration:underline;">099206 67756</a>
                        </p>
                        <span style="font-size:0.85rem; color:rgba(255,255,255,0.9);">Available for business enquiries & breakdown assistance</span>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div>
                        <strong style="color:#ffeb3b; display:block; margin-bottom:4px; font-size:0.95rem; text-transform:uppercase; letter-spacing:0.5px;">Email Contact</strong>
                        <p style="color:#FFF; font-size:1.1rem; font-weight:700;">
                            <a href="mailto:info@ggcc.org.in" style="color:#FFF; text-decoration:underline;">info@ggcc.org.in</a>
                        </p>
                    </div>
                </div>

                <div style="border-top:1px solid rgba(255,255,255,0.2); padding-top:20px; margin-top:10px;">
                    <strong style="color:#ffeb3b; display:block; margin-bottom:8px; font-size:0.95rem; text-transform:uppercase; letter-spacing:0.5px;">Regional Service Coverage</strong>
                    <p style="font-size:0.88rem; color:rgba(255,255,255,0.9); line-height:1.6;">
                        Operating across 13 industrial locations: Vashi, Mumbai, Chennai, Bangalore, Coimbatore, Madurai, Trichy, Indore, Gwalior, Bhopal, Kochi, Nanded & Tirunelveli.
                    </p>
                </div>
            </div>

            <!-- Business Enquiry Form -->
            <div style="background:#FFF; padding:30px; border-radius:var(--radius-md); border:1px solid var(--border-color); box-shadow:var(--shadow-md);">
                <h3 style="font-size:1.5rem; margin-bottom:8px; color:var(--primary-dark);">Send Us a Business Enquiry</h3>
                <p style="color:var(--text-muted); font-size:0.95rem; margin-bottom:25px;">Fill out the form below and our electrical engineering project team will get back to you within 24 hours.</p>

                <form id="siteContactForm">
                    <div class="form-group">
                        <label class="form-label">Full Name / Organization *</label>
                        <input type="text" class="form-control" placeholder="Enter your full name or company name" required>
                    </div>

                    <div class="grid-2" style="gap:15px;">
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" placeholder="099206 67756" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email ID *</label>
                            <input type="email" class="form-control" placeholder="info@ggcc.org.in" required>
                        </div>
                    </div>

                    <div class="grid-2" style="gap:15px;">
                        <div class="form-group">
                            <label class="form-label">Required Electrical Service</label>
                            <select class="form-control">
                                <option value="">Select Service</option>
                                <?php foreach($services_menu as $s): ?>
                                    <option value="<?php echo $s['slug']; ?>"><?php echo htmlspecialchars($s['title']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Project Location</label>
                            <select class="form-control">
                                <option value="">Select Location</option>
                                <?php foreach($locations_menu as $l): ?>
                                    <option value="<?php echo $l['slug']; ?>"><?php echo htmlspecialchars($l['city_name']); ?> (<?php echo $l['state']; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message / Technical Requirements</label>
                        <textarea class="form-control" placeholder="Describe your project scope, load requirement, transformer capacity, or required service timeline..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-navy" style="width:100%;">Submit Business Enquiry &rarr;</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Google Maps Integration Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="section-title-wrap">
            <div class="section-subtitle">Map Location</div>
            <h2 class="section-title">Find GGCC Main Branch Office</h2>
            <p class="section-desc">Located at Sanpada, Sector 8, Navi Mumbai — Accessible via Mumbai-Pune Highway and Sanpada Railway Station.</p>
        </div>

        <div class="map-responsive">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.835154378129!2d73.0075306!3d19.0709667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c14e6b52c0ad%3A0x6717a66b96e95155!2sSector%208%2C%20Sanpada%2C%20Navi%20Mumbai%2C%20Maharashtra%20400705!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
