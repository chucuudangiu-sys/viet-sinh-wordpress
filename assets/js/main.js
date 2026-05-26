/**
 * Viet Sinh Mechanical - Main JavaScript File
 * Handles page navigation, language switching, and interactions
 */

// Current language state
var currentLang = 'vi';

/**
 * Show specific page
 * @param {string} pageId - The page ID to show
 */
function showPage(pageId) {
    console.log('Navigating to:', pageId);
    // Implementation will be done when migrating from SPA to WordPress Posts/Pages
    window.location.href = pageId === 'home' ? vietSinhData.siteUrl : vietSinhData.siteUrl + '/' + pageId;
}

/**
 * Set language (Vietnamese or English)
 * @param {string} lang - Language code: 'vi' or 'en'
 */
function setLang(lang) {
    currentLang = lang;
    
    // Update active button
    document.getElementById('lang-vi').classList.toggle('active', lang === 'vi');
    document.getElementById('lang-en').classList.toggle('active', lang === 'en');
    
    // Update all translatable elements
    document.querySelectorAll('[data-vi][data-en]').forEach(function(el) {
        el.innerHTML = lang === 'vi' ? el.getAttribute('data-vi') : el.getAttribute('data-en');
    });
    
    // Store preference in localStorage
    localStorage.setItem('vietSinhLang', lang);
}

/**
 * Handle search functionality
 * @param {Event} e - Keyboard event
 */
function handleSearch(e) {
    if (e.key === 'Enter') {
        var q = e.target.value.trim().toLowerCase();
        if (!q) return;

        // Route search to appropriate page
        if (
            q.includes('sản phẩm') || q.includes('product') ||
            q.includes('kelly') || q.includes('rotation') ||
            q.includes('cdm') || q.includes('máy')
        ) {
            window.location.href = vietSinhData.siteUrl + '/products';
        } else if (
            q.includes('dịch vụ') || q.includes('service') ||
            q.includes('bảo trì') || q.includes('cho thuê')
        ) {
            window.location.href = vietSinhData.siteUrl + '/services';
        } else if (
            q.includes('tin') || q.includes('news') ||
            q.includes('hợp tác') || q.includes('cập nhật')
        ) {
            window.location.href = vietSinhData.siteUrl + '/news';
        } else if (
            q.includes('liên hệ') || q.includes('contact') ||
            q.includes('địa chỉ') || q.includes('điện thoại')
        ) {
            window.location.href = vietSinhData.siteUrl + '/contact';
        } else if (
            q.includes('về') || q.includes('about') ||
            q.includes('lịch sử') || q.includes('công ty')
        ) {
            window.location.href = vietSinhData.siteUrl + '/about';
        }

        // Clear input
        e.target.value = '';
    }
}

/**
 * Submit CTA form (on home page)
 */
function submitCtaForm() {
    var name = document.getElementById('cta-name')?.value.trim();
    var phone = document.getElementById('cta-phone')?.value.trim();
    var email = document.getElementById('cta-email')?.value.trim();
    var msg = document.getElementById('cta-msg')?.value.trim();

    if (!name || !phone || !email || !msg) {
        alert('Vui lòng điền đầy đủ tất cả các trường trước khi gửi.');
        return;
    }

    // Send to server via AJAX
    var formData = new FormData();
    formData.append('action', 'submit_cta_form');
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('message', msg);
    formData.append('nonce', vietSinhData.nonce);

    fetch(vietSinhData.restUrl + 'wp/v2/cta-submissions', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('ctaFormInner').style.display = 'none';
            document.getElementById('ctaThankYou').style.display = 'block';
        }
    })
    .catch(error => console.error('Error:', error));
}

/**
 * Submit contact form (on contact page)
 */
function submitContactForm() {
    var name = document.getElementById('cf-name')?.value.trim();
    var phone = document.getElementById('cf-phone')?.value.trim();
    var email = document.getElementById('cf-email')?.value.trim();
    var msg = document.getElementById('cf-msg')?.value.trim();

    if (!name || !phone || !email || !msg) {
        alert('Please fill in all fields before submitting.');
        return;
    }

    // Send to server via AJAX
    var formData = new FormData();
    formData.append('action', 'submit_contact_form');
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('email', email);
    formData.append('message', msg);
    formData.append('nonce', vietSinhData.nonce);

    fetch(vietSinhData.restUrl + 'wp/v2/contact-submissions', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('contactFormInner').style.display = 'none';
            document.getElementById('contactThankYou').style.display = 'block';
        }
    })
    .catch(error => console.error('Error:', error));
}

/**
 * Filter products by category
 * @param {string} cat - Category to filter
 * @param {HTMLElement} btn - Button element
 */
function filterProducts(cat, btn) {
    document.querySelectorAll('#products-grid .product-card').forEach(card => {
        card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'block' : 'none';
    });
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}

/**
 * Initialize on document ready
 */
document.addEventListener('DOMContentLoaded', function() {
    // Set default language from localStorage or Vietnamese
    var savedLang = localStorage.getItem('vietSinhLang') || 'vi';
    setLang(savedLang);

    // Initialize theme
    initializeTheme();
});

/**
 * Initialize theme functionality
 */
function initializeTheme() {
    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';

    // Handle navigation active state based on current page
    updateNavigationActive();
}

/**
 * Update navigation active state
 */
function updateNavigationActive() {
    var currentUrl = window.location.href;
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.classList.remove('active');
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });
}

/**
 * Utility: Scroll to element smoothly
 * @param {HTMLElement} element - Element to scroll to
 */
function scrollToElement(element) {
    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

/**
 * Utility: Add loading state to buttons
 * @param {HTMLElement} button - Button element
 * @param {boolean} isLoading - Loading state
 */
function setButtonLoading(button, isLoading) {
    if (isLoading) {
        button.disabled = true;
        button.textContent = 'Loading...';
    } else {
        button.disabled = false;
        button.textContent = button.getAttribute('data-original-text') || 'Submit';
    }
}
