<?php

namespace Tematech\AliceNotify;

use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;

class AliceNotifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('alice-notify.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'alice-notify');

        // Register the main class to use with the facade
        $this->app->singleton(AliceNotify::class, function () {
            return new AliceNotify();
        });

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('alice', function () {
                return new AliceNotifyChannel();
            });
        });
    }
}
