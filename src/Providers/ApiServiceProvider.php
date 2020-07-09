<?php


namespace Mango\LaravelWeChatbot\Providers;


use Mango\LaravelWeChatbot\Api\ApiHandler;
use Mango\LaravelWeChatbot\Api\Search;
use Mango\LaravelWeChatbot\Api\Send;

class ApiServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('api', function(){
            return new ApiHandler();
        });
        $this->app->singleton('apiSend', function(){
            return new Send();
        });
        $this->app->singleton('apiSearch', function(){
            return new Search();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
