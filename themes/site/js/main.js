/**
 * GGCC Corporate Website - Main JavaScript
 */
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Drawer Navigation Toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const closeDrawer = document.getElementById('closeDrawer');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileDrawer = document.getElementById('mobileDrawer');

    if (mobileToggle && mobileDrawer && mobileOverlay) {
        mobileToggle.addEventListener('click', function() {
            mobileDrawer.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        function closeMobileNav() {
            mobileDrawer.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (closeDrawer) {
            closeDrawer.addEventListener('click', closeMobileNav);
        }
        mobileOverlay.addEventListener('click', closeMobileNav);
    }

    // FAQ Accordion Toggle
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const isOpen = item.classList.contains('open');
            
            // Close all items in the same container
            const container = item.closest('.accordion-container') || document;
            container.querySelectorAll('.accordion-item').forEach(i => {
                i.classList.remove('open');
            });

            // Toggle clicked item
            if (!isOpen) {
                item.classList.add('open');
            }
        });
    });

    // Gallery Tab Switching
    const galleryTabBtns = document.querySelectorAll('.gallery-tab-btn');
    const galleryPanes = document.querySelectorAll('.gallery-pane');

    galleryTabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            galleryTabBtns.forEach(b => b.classList.remove('active'));
            galleryPanes.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            const activePane = document.getElementById(targetTab);
            if (activePane) {
                activePane.classList.add('active');
            }
        });
    });

    // Contact Form AJAX / Mock Submission
    const contactForm = document.getElementById('siteContactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerText;

            submitBtn.disabled = true;
            submitBtn.innerText = 'Sending Message...';

            setTimeout(function() {
                alert('Thank you for contacting George General Construction Company (GGCC). Your enquiry has been received and our engineering team will get back to you shortly.');
                contactForm.reset();
                submitBtn.disabled = false;
                submitBtn.innerText = originalText;
            }, 1000);
        });
    }
});
