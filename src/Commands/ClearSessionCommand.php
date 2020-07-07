<?php

namespace Mango\LaravelWeChatbot\Commands;

use Illuminate\Console\Command;

class ClearSessionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wechatbot:clearSession';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear WechatBot Session!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //
    }

    /**
     * 在注册后启动服务
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/path/to/config/courier.php' => config_path('courier.php'),
        ]);
    }
}
