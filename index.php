<?php
/**
 * Created by PhpStorm.
 * User: Placeless
 * Date: 2015/12/30
 * Time: 14:24
 */

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';