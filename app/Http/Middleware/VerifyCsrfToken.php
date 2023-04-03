<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/ilab-admin/changeDeliveryPrice',
        '/ilab-admin/create/question',
        '/controlPanel/create/product',
        '/controlPanel/create/page',
        '/controlPanel/pages/*',
        '/schedulePlaning',
        '/changeDay/*',
        '/getJobInformation/*',
    ];
}
