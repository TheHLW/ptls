<?php
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 公共控制模块
// +----------------------------------------------------------------------
namespace app\common\controller;

use think\Controller;

class Base extends Controller
{
    //public static $Cache = array(); //全局配置缓存

    //初始化站点配置信息
    /*protected function initSite()
    {
    $Config = cache("Config"); //获取所有配置名称和值
    var_dump($Config);
    exit();
    self::$Cache['Config'] = $Config; //后端调用
    $this->assign("Config", $Config); //前端调用
    }*/

    //空操作
    public function _empty()
    {
        $this->error('该页面不存在！');
    }
}
