<?php


namespace Mango\LaravelWechatbot\Core;


use Mango\LaravelWechatbot\Exceptions\ArgumentException;
use Mango\LaravelWechatbot\Exceptions\RequestWeChatException;
use Mango\LaravelWechatbot\Exceptions\WeChatCookieErrorException;
use Mango\LaravelWechatbot\Exceptions\WeChatTicketErrorException;
use Mango\LaravelWechatbot\Exceptions\LoginFailedException;

class ApiHandler
{
    public static function handle($bag, $callback)
    {
        if ($callback && !is_callable($callback)) {
            throw new ArgumentException('Argument must to be callback!');
        }

        if ($bag['BaseResponse']['Ret'] != 0) {
            if ($callback) {
                call_user_func_array($callback, $bag);
            }
        }

        switch ($bag['BaseResponse']['Ret']) {
            case 1:
                throw new RequestWeChatException('Argument pass error.');
                break;
            case -14:
                throw new WeChatTicketErrorException('Ticket error.');
                break;
            case 1100:
                throw new LoginFailedException('Logout. error_code: 1100');
                break;
            case 1101:
                throw new LoginFailedException('Logout. error_code: 1101');
                break;
            case 1102:
                throw new WeChatCookieErrorException('Cookies invalid.');
                break;
            case 1105:
                throw new ResquestWechatException('Api frequency.');
                break;
        }

        return $bag;
    }
}
