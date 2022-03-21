<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://localhost:8000/login',
        'http://localhost:8000/daftarakun',
        'http://localhost:8000/belibarang',
        'http://localhost:8000/jualbarang',
        'http://localhost:8000/tesinput',
        'http://localhost:8000/tambahproduk',
        'http://localhost:8000/tambahkategoriproduk'
    ];
}
