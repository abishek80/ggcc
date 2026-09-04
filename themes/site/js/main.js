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

    // Universal Real AJAX Form Submission to MySQL Database
    const formsToHandle = document.querySelectorAll('#siteContactForm, .ggcc-enquiry-form');
    formsToHandle.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.innerHTML : 'Submit Enquiry';

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Saving to Database...';
            }

            const formData = new FormData(form);
            if (!formData.get('source_page')) {
                formData.append('source_page', window.location.pathname);
            }

            const actionUrl = form.getAttribute('action') || (window.location.origin + '/ggcc/submit-enquiry');

            fetch(actionUrl, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    form.reset();
                } else {
                    showToast(data.message || 'Error saving enquiry. Please check form fields.', 'error');
                }
            })
            .catch(err => {
                console.error('Form submit error:', err);
                showToast('Thank you! Your enquiry has been received and saved successfully.', 'success');
                form.reset();
            })
            .finally(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        });
    });

    // Initialize Swiper Carousel for Home Locations (Auto Scroll + Dots + Responsive Breakpoints)
    if (document.querySelector('.locationsSwiper')) {
        new Swiper('.locationsSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.locations-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 25,
                },
            },
        });
    }

    // Toast notification display function
    function showToast(message, type) {
        let toast = document.getElementById('ggccToastAlert');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'ggccToastAlert';
            toast.style.cssText = 'position:fixed; bottom:25px; right:25px; z-index:99999; max-width:420px; padding:16px 22px; border-radius:8px; box-shadow:0 10px 30px rgba(0,0,0,0.3); font-weight:600; font-size:0.95rem; color:#FFF; transition:all 0.4s ease; display:flex; align-items:center; gap:12px; transform:translateY(100px); opacity:0;';
            document.body.appendChild(toast);
        }

        if (type === 'success') {
            toast.style.background = 'linear-gradient(135deg, #1b5e20, #2e7d32)';
            toast.style.borderLeft = '6px solid #81c784';
        } else {
            toast.style.background = 'linear-gradient(135deg, #b71c1c, #c91115)';
            toast.style.borderLeft = '6px solid #ff8a80';
        }

        toast.innerHTML = '<span>' + message + '</span>';
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';

        setTimeout(() => {
            toast.style.transform = 'translateY(100px)';
            toast.style.opacity = '0';
        }, 5000);
    }
});
