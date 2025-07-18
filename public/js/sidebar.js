// Sidebar JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');

    // Toggle sidebar
    function toggleSidebar() {
        if (window.innerWidth <= 768) {
            // Mobile: show/hide sidebar
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('active');
        } else {
            // Desktop: collapse/expand sidebar
            sidebar.classList.toggle('collapsed');
        }
    }

    // Desktop sidebar toggle
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }

    // Mobile sidebar toggle from navbar
    if (mobileSidebarToggle) {
        mobileSidebarToggle.addEventListener('click', toggleSidebar);
    }

    // Close sidebar when clicking overlay (mobile)
    sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('active');
    });

    // Add tooltips for collapsed sidebar
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        const text = link.querySelector('.nav-text');
        if (text) {
            link.setAttribute('data-tooltip', text.textContent);
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('active');
        }
    });

    // Active menu detection based on current URL
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll('.nav-link');
    
    menuLinks.forEach(link => {
        link.classList.remove('active');
        const href = link.getAttribute('href');
        if (href && currentPath.includes(href.replace(window.location.origin, ''))) {
            link.classList.add('active');
        }
    });

    // Realtime Jam 
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        const clockElement = document.getElementById('navbar-clock');
        if (clockElement) {
            clockElement.textContent = timeString;
        }
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call
});
