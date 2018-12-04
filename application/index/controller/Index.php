<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'ptls行业网站 init';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
