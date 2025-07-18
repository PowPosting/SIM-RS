<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Auth extends BaseConfig
{
    /**
     * Maximum login attempts before account lockout
     */
    public int $maxLoginAttempts = 5;

    /**
     * Lockout duration in minutes
     */
    public int $lockoutDuration = 15;

    /**
     * Session timeout in minutes (0 = no timeout)
     */
    public int $sessionTimeout = 0;

    /**
     * Remember me duration in days
     */
    public int $rememberMeDuration = 30;

    /**
     * Redirect URL after successful login
     */
    public string $loginRedirect = '/dashboard';

    /**
     * Redirect URL after logout
     */
    public string $logoutRedirect = '/login';

    /**
     * Default user role
     */
    public string $defaultRole = 'user';

    /**
     * Available user roles
     */
    public array $availableRoles = [
        'admin' => 'Administrator',
        'doctor' => 'Dokter',
        'nurse' => 'Perawat',
        'user' => 'User Biasa'
    ];

    /**
     * Password requirements
     */
    public array $passwordRequirements = [
        'min_length' => 6,
        'require_uppercase' => false,
        'require_lowercase' => false,
        'require_numbers' => false,
        'require_symbols' => false
    ];

    /**
     * Routes yang tidak memerlukan autentikasi
     */
    public array $publicRoutes = [
        'login',
        'forgot-password',
        'reset-password'
    ];

    /**
     * Routes yang hanya bisa diakses guest
     */
    public array $guestOnlyRoutes = [
        'login',
        'register'
    ];
}
