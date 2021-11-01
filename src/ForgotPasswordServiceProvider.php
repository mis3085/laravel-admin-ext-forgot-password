<?php

namespace Mis3085\ForgotPassword;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ForgotPasswordServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(ForgotPassword $extension)
    {
        if (!ForgotPassword::boot()) {
            return;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'mis3085');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/mis3085/laravel-admin-ext-forgot-password')],
                'laravel-admin-ext-forgot-password'
            );
        }

        $this->app->booted(function () {
            Route::group([
                'prefix'     => config('admin.route.prefix'),
                'middleware' => 'web',
            ], __DIR__.'/../routes/web.php');
        });
    }
}
