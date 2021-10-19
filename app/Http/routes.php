<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

$namespace = config('admin-generator.namespace');
$instances = config('admin-generator.instances', []);

foreach ($instances as $name => $instance) {

    $attributes = [
        'domain' => $instance['domain'],
        'prefix' => $instance['prefix']
    ];

    Route::group($attributes, function (Router $router) use ($namespace, $name, $instance) {
            $router->get('{slug?}', [
                'middleware' => [ 'auth' ],
                function (Request $request) use ($namespace, $name) {
                    return view("{$namespace}.{$name}.app", compact('namespace', 'name', 'request'));
                }
            ])->where('slug', '^[^~]*$');
    });
}