<?php

namespace Mango\LaravelWeChatbot;

use Illuminate\Support\ServiceProvider;
use Mango\LaravelWeChatbot\Commands\ClearSessionCommand;
use Mango\LaravelWeChatbot\Commands\InstallCommand;


class LaravelWeChatServiceProvider extends ServiceProvider
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
        $this->registerConfigure();
        $this->registerCommands();
    }

    /**
     * 发布扩展包命令文件
     */
    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                ClearSessionCommand::class
            ]);
        }
    }

    /**
     * 发布扩展包配置信息
     */
    public function registerConfigure()
    {
        $this->publishes([
            $this->getConfigFile() => config_path('wechatbot.php'),
        ]);
    }

    /**
     * @return string
     */
    protected function getConfigFile(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'laravel-wechat.php';
    }
}
