<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/29
 * Time: 17:33
 * 9.4 直播状态控制接口
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\ModifyLiveStatus;
//开始直播
$startLiveArray = [
    'channel_web_id' => '0a2dnq6coqajoqiL4K2fnK2cp-yema-Yp6ef',
    'live_status' => 'living'
];

//结束直播
//$stopLiveArray = [
//    'channel_web_id' => '0a2dnq6coqagmaeL4K2fnK2cp-yema-Xqamd',
//    'live_status' => 'stopped'
//];
echo (new ModifyLiveStatus($startLiveArray))->get()->toXml();