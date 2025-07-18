<?php

if (!function_exists('load_sidebar_menu')) {
    /**
     * Load sidebar menu berdasarkan role user
     * 
     * @param string $role Role user (admin, dokter, perawat, farmasi, kasir, admisi, manajemen)
     * @return string HTML content untuk menu sidebar
     */
    function load_sidebar_menu($role) {
        $menuPath = APPPATH . 'Views/layouts/sidebar/' . $role . '_menu.php';
        
        if (file_exists($menuPath)) {
            ob_start();
            include $menuPath;
            return ob_get_clean();
        }
        
        // Fallback jika file menu tidak ditemukan
        return '<li class="nav-item"><span class="nav-text">Menu tidak ditemukan untuk role: ' . $role . '</span></li>';
    }
}

if (!function_exists('get_available_menu_roles')) {
    /**
     * Mendapatkan daftar role yang memiliki file menu
     * 
     * @return array Daftar role yang tersedia
     */
    function get_available_menu_roles() {
        $menuDir = APPPATH . 'Views/layouts/sidebar/';
        $roles = [];
        
        $files = glob($menuDir . '*_menu.php');
        foreach ($files as $file) {
            $filename = basename($file, '_menu.php');
            $roles[] = $filename;
        }
        
        return $roles;
    }
}

if (!function_exists('menu_exists_for_role')) {
    /**
     * Cek apakah file menu tersedia untuk role tertentu
     * 
     * @param string $role Role yang akan dicek
     * @return bool True jika file menu ada, false jika tidak
     */
    function menu_exists_for_role($role) {
        $menuPath = APPPATH . 'Views/layouts/sidebar/' . $role . '_menu.php';
        return file_exists($menuPath);
    }
}
