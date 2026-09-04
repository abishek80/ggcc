    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Col 1: Company Profile -->
                <div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:15px;">
                        <img src="<?php echo base_url('themes/images/ggcc-logo.png'); ?>" alt="GGCC Logo" style="height:40px; width:auto; object-fit:contain; background:#FFFFFF; padding:4px 8px; border-radius:6px;">
                    </div>
                    <p style="margin-bottom:20px; line-height:1.6; color:rgba(255,255,255,0.75);">
                        George General Construction Company (GGCC) is a premier licensed electrical contracting and installation firm. We deliver turnkey industrial electrification, HT/LT cable laying, custom control panel fabrication, and power maintenance across India.
                    </p>
                    <p style="font-size:0.85rem; color:var(--card-bg);">
                        <strong>Main Office:</strong> Suyog Samuha CHS Ltd, 9, Plot No. 41 to 44, Sector 8, Sanpada, Navi Mumbai, MH 400705
                    </p>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="footer-col-title">Quick Links</h4>
                    <div class="footer-links">
                        <a href="<?php echo base_url(); ?>">Home</a>
                        <a href="<?php echo base_url('about'); ?>">About GGCC</a>
                        <a href="<?php echo base_url('services'); ?>">All Services</a>
                        <a href="<?php echo base_url('gallery'); ?>">Gallery & Awards</a>
                        <a href="<?php echo base_url('partners-customers'); ?>">Partners & Clients</a>
                        <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                        <a href="<?php echo base_url('terms-and-conditions'); ?>">Terms & Conditions</a>
                        <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a>
                    </div>
                </div>

                <!-- Col 3: Key Services -->
                <div>
                    <h4 class="footer-col-title">Core Services</h4>
                    <div class="footer-links">
                        <a href="<?php echo base_url('services/electrical-contracting'); ?>">Electrical Contracting</a>
                        <a href="<?php echo base_url('services/industrial-electrical-installation'); ?>">Industrial Installation</a>
                        <a href="<?php echo base_url('services/commercial-electrical-installation'); ?>">Commercial Installation</a>
                        <a href="<?php echo base_url('services/annual-maintenance-contract-amc'); ?>">Electrical AMC</a>
                        <a href="<?php echo base_url('services/ht-lt-cable-laying'); ?>">HT & LT Cable Laying</a>
                        <a href="<?php echo base_url('services/lt-control-panel-installation'); ?>">LT Panel Installation</a>
                        <a href="<?php echo base_url('services/flameproof-electrical-installation'); ?>">Flameproof Installation</a>
                        <a href="<?php echo base_url('services/apfc-panel-installation'); ?>">APFC Panels</a>
                    </div>
                </div>

                <!-- Col 4: Key Locations -->
                <div>
                    <h4 class="footer-col-title">Service Locations</h4>
                    <div class="footer-links" style="display:grid; grid-template-columns:1fr 1fr; gap:6px;">
                        <a href="<?php echo base_url('locations/mumbai'); ?>">Mumbai</a>
                        <a href="<?php echo base_url('locations/vashi'); ?>">Vashi</a>
                        <a href="<?php echo base_url('locations/chennai'); ?>">Chennai</a>
                        <a href="<?php echo base_url('locations/bangalore'); ?>">Bangalore</a>
                        <a href="<?php echo base_url('locations/coimbatore'); ?>">Coimbatore</a>
                        <a href="<?php echo base_url('locations/madurai'); ?>">Madurai</a>
                        <a href="<?php echo base_url('locations/indore'); ?>">Indore</a>
                        <a href="<?php echo base_url('locations/gwalior'); ?>">Gwalior</a>
                        <a href="<?php echo base_url('locations/bhopal'); ?>">Bhopal</a>
                        <a href="<?php echo base_url('locations/kochi'); ?>">Kochi</a>
                        <a href="<?php echo base_url('locations/tiruchirappalli'); ?>">Trichy</a>
                        <a href="<?php echo base_url('locations/nanded'); ?>">Nanded</a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> George General Construction Company (GGCC). All Rights Reserved. | Professional Electrical Contracting & Infrastructure Services.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- JS Main Script -->
    <script src="<?php echo base_url('themes/site/js/main.js'); ?>"></script>
</body>
</html>
