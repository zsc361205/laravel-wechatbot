<?php

namespace Mango\LaravelWeChatbot\Providers;

use Illuminate\Support\ServiceProvider;
use Mango\LaravelWeChatbot\Contact\Contacts;
use Mango\LaravelWeChatbot\Contact\Friends;
use Mango\LaravelWeChatbot\Contact\Groups;
use Mango\LaravelWeChatbot\Contact\Members;
use Mango\LaravelWeChatbot\Contact\Myself;
use Mango\LaravelWeChatbot\Contact\Officials;
use Mango\LaravelWeChatbot\Contact\Specials;


class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('contacts', function ($app){
            return new Contacts($app);
        });

        $this->app->singleton('myself', function(){
            return new Myself();
        });

        $this->app->singleton('friends', function(){
            return new Friends();
        });

        $this->app->singleton('groups', function(){
            return new Groups();
        });

        $this->app->singleton('member', function(){
            return new Members();
        });

        $this->app->singleton('officials', function(){
            return new Officials();
        });

        $this->app->singleton('specials', function(){
            return new Specials();
        });
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
