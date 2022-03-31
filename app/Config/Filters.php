<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\LoginFilter;
use App\Filters\AdminFilter;
use App\Filters\KasirFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'isloggedIn' => LoginFilter::class,
        'AdminFilter' => \App\Filters\AdminFilter::class,
        'KasirFilter' => \App\Filters\KasirFilter::class,
        'ManagerFilter' => \App\Filters\ManagerFilter::class,
        // 'AdminFilter' => \App\Filters\AdminFilter::class
        // 'AdminFilter'=>AdminFilter::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'AdminFilter' =>
            [
                'except' => ['login/*', 'Login']
            ],
            'KasirFilter' =>
            [
                'except' => ['login/*', 'Login']
            ],
            'ManagerFilter' =>
            [
                'except' => ['login/*', 'Login']
            ]
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',

        ],
        'after' => [
            'toolbar',
            'AdminFilter' => [
                'except' => [
                    'home',
                    'user', 'user/*',
                    'log/*'
                ],
            ],
            'KasirFilter' => [
                'except' => [
                    'home',
                    'order', 'order/*',
                    'transaksi', 'transaksi/*'
                ]
            ],

            'ManagerFilter' => [
                'except' => [
                    'home',
                    'menu', 'menu/*',
                    'transaksi', 'transaksi/*',
                    'log/*'
                ]
            ],

        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
