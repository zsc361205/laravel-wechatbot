<?php


namespace Mango\LaravelWeChatbot\Foundation;


use Illuminate\Support\Facades\App;

class WeChatBot
{
    public  function __construct()
    {
        $this->initializeConfig();
    }

    public function Index()
    {
        $e = App::make('apiSend');
        echo('这就是传说中的？');
    }

    /**
     * 初始化配置数据
     */
    protected function initializeConfig()
    {

    }
}
