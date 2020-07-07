<?php


namespace Mango\LaravelWechatbot\Message\Traits;


use Hanson\Vbot\Message\Text;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Mango\LaravelWechatbot\Core\ApiHandler;

trait SendMsg
{
    protected static function sendMsg($msg)
    {
        $data = [
            'BaseRequest' => Config::get('server.baseRequest'),
            'Msg' => $msg,
            'Scene' => 0,
        ];

        $result = Http::post(static::getUrl(),
            son_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), true
        );
        static::stopSync();
        sleep(1);
      return ApiHandler::handle($result);
    }

    protected static function getUrl()
    {
        return Config::get('server.baseRequest');
    }

    private static function stopSync()
    {
        if (get_class(new static()) != Text::class) {
            Text::send('filehelper', 'stop sync');
        }
    }

    abstract public static function send(...$args);
}
