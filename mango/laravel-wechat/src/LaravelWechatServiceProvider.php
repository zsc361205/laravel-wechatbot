<?php

namespace Mango\LaravelWechat;

use Illuminate\Support\ServiceProvider;

class LaravelWechatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('avatar', function ($app) {
            return new Avatar($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/../config/laravel-wechat.php' => config_path('laravel-wechat.php'),
        ]);
    }
}
