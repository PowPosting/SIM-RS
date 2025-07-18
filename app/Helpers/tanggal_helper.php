<?php

if (!function_exists('tanggal_indonesia')) {
    /**
     * Convert date to Indonesian format
     * 
     * @param string $date
     * @param string $format
     * @return string
     */
    function tanggal_indonesia($date, $format = 'full') {
        if (empty($date)) return '';
        
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        $tanggal = new DateTime($date);
        
        switch ($format) {
            case 'full':
                return $tanggal->format('d') . ' ' . $bulan[(int)$tanggal->format('m')] . ' ' . $tanggal->format('Y');
            case 'short':
                return $tanggal->format('d') . ' ' . substr($bulan[(int)$tanggal->format('m')], 0, 3) . ' ' . $tanggal->format('Y');
            case 'numeric':
                return $tanggal->format('d-m-Y');
            default:
                return $tanggal->format('d') . ' ' . $bulan[(int)$tanggal->format('m')] . ' ' . $tanggal->format('Y');
        }
    }
}

if (!function_exists('hari_indonesia')) {
    /**
     * Get day name in Indonesian
     * 
     * @param string $date
     * @return string
     */
    function hari_indonesia($date) {
        if (empty($date)) return '';
        
        $hari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        
        $tanggal = new DateTime($date);
        return $hari[$tanggal->format('l')];
    }
}

if (!function_exists('tanggal_hari_ini')) {
    /**
     * Get today's date in Indonesian format
     * 
     * @return string
     */
    function tanggal_hari_ini() {
        return tanggal_indonesia(date('Y-m-d'));
    }
}

if (!function_exists('hitung_umur')) {
    /**
     * Calculate age from birth date
     * 
     * @param string $tanggal_lahir
     * @return int
     */
    function hitung_umur($tanggal_lahir) {
        if (empty($tanggal_lahir)) return 0;
        
        $lahir = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        return $sekarang->diff($lahir)->y;
    }
}
