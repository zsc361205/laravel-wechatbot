<?php
/**
 * Created by PhpStorm.
 * User: zsc
 * Date: 2020-07-01
 * Time: 16:03.
 */

namespace Mango\LaravelWechatbot\Message;


interface MessageInterface
{
    public function make($msg);
}
