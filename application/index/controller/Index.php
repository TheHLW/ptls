<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 'git 推送测试 第二次推送';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
