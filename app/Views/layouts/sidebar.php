<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="brand">
            <div class="brand-icon">
                <img src="<?= base_url('img/logo_rs_baru.png') ?>" alt="Logo RS" style="width: 32px; height: 32px; object-fit: contain;">
            </div>
            <span class="brand-text">RS HAMORI</span>
        </div>
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <!-- Navigation Menu -->
    <nav class="sidebar-nav">
        <ul class="nav-list">

            <!-- Menu Header -->
            <li class="nav-header">Menu Utama</li>

            <!-- Dashboard - Semua Role -->
            <li class="nav-item">
                <a href="<?= base_url('dashboard') ?>" class="nav-link active" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                    <i class="fa-solid fa-house nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <?php 
            // Load sidebar helper
            helper('sidebar');
            
            $userRole = session()->get('role');
            
            // Load menu berdasarkan role menggunakan sistem modular
            if ($userRole && menu_exists_for_role($userRole)) {
                echo load_sidebar_menu($userRole);
            } else {
                // Fallback jika role tidak dikenal atau file menu tidak ada
                echo '<li class="nav-item"><span class="nav-text">Menu tidak tersedia untuk role: ' . $userRole . '</span></li>';
            }
            ?>
        </ul>
    </nav>
</div>

<!-- Overlay for mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Submenu styles - matching pastel theme */
.has-submenu .submenu-arrow {
    margin-left: auto;
    transition: transform 0.3s ease;
    font-size: 0.8em;
    color: var(--text-light);
}

.has-submenu.active .submenu-arrow {
    transform: rotate(180deg);
    color: var(--soft-blue);
}

.has-submenu .nav-link:hover .submenu-arrow {
    color: var(--soft-blue);
}

.submenu {
    display: none;
    list-style: none;
    padding: 4px 0;
    margin: 4px 0 0 0;
    background: transparent;
    border-radius: 0;
    border: none;
    box-shadow: none;
}

.has-submenu.active .submenu {
    display: block;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.submenu-item {
    padding: 0;
    margin: 1px 0;
}

.submenu-link {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    color: var(--text-light);
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.9em;
    border-radius: 6px;
    gap: 12px;
}

.submenu-link:hover {
    background: var(--pastel-blue);
    color: var(--soft-blue);
    text-decoration: none;
    transform: translateX(2px);
}

.submenu-icon {
    width: 18px;
    margin-right: 0;
    font-size: 0.85em;
    color: var(--text-light);
    transition: color 0.3s ease;
    flex-shrink: 0;
}

.submenu-link:hover .submenu-icon {
    color: var(--soft-blue);
}

.submenu-text {
    white-space: nowrap;
    font-weight: 500;
    flex: 1;
}

/* Active submenu item */
.submenu-link.active {
    background: var(--pastel-blue);
    color: var(--soft-blue);
    border-left: 3px solid var(--soft-blue);
}

/* Hide submenu text when sidebar is collapsed */
.sidebar.collapsed .submenu-text {
    display: none;
}

.sidebar.collapsed .submenu {
    display: none !important;
}

/* Enhance main menu item when has submenu */
.has-submenu .nav-link {
    position: relative;
}

.has-submenu.active .nav-link {
    background: var(--pastel-blue);
    color: var(--soft-blue);
}

/* Mobile responsive */
@media (max-width: 768px) {
    .submenu-link {
        padding: 8px 12px;
        font-size: 0.85em;
    }
    
    .submenu-icon {
        width: 16px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover'
        });
    });

    // Function to toggle tooltips based on sidebar state
    function toggleTooltips() {
        const sidebar = document.getElementById('sidebar');
        const isCollapsed = sidebar.classList.contains('collapsed');
        
        tooltipList.forEach(function(tooltip) {
            if (isCollapsed) {
                tooltip.enable();
            } else {
                tooltip.disable();
            }
        });
    }

    // Submenu toggle functionality
    document.querySelectorAll('.submenu-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const parentItem = this.closest('.has-submenu');
            const isActive = parentItem.classList.contains('active');
            
            // Close all other submenus
            document.querySelectorAll('.has-submenu.active').forEach(function(item) {
                if (item !== parentItem) {
                    item.classList.remove('active');
                }
            });
            
            // Toggle current submenu
            if (isActive) {
                parentItem.classList.remove('active');
            } else {
                parentItem.classList.add('active');
            }
        });
    });

    // Initial check
    toggleTooltips();

    // Listen for sidebar toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            setTimeout(toggleTooltips, 100); // Small delay to ensure class is added
        });
    }

    // Listen for window resize
    window.addEventListener('resize', function() {
        setTimeout(toggleTooltips, 100);
    });
});
</script>
