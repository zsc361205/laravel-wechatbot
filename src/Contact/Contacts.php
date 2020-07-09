<?php
/**
 * Author: zhaoshengchao
 * Date: 2020/7/9
 * Time：1:49 下午
 * Note: 联系方式基类
 */

namespace Mango\LaravelWeChatbot\Contact;


use Illuminate\Container\Container;
use Illuminate\Support\Collection;

class Contacts extends Collection
{
    protected $app;

    public function __construct($items = [])
    {
        parent::__construct($items);
    }

    public function setApp(Container $app)
    {
        $this->app = $app;
        return $this;
    }
}
