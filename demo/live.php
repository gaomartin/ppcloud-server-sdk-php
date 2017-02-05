<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/5
 * Time: 17:34
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
//创建直播
//$array = [
//    'title' => 'aaa',
//    'mode' => 'camera',
//    'start_time' => 1466083600000,
//    'end_time' => 1466086601000
//];
//echo Live::createLive($array)->toXml();die;


$channel_web_id = '0a2dnq6cpqiim6uL4K2fnK2cp-yemq2cpKOd';


//请求推流地址接口
//$publish = [
//    'channel_web_id' => $channel_web_id,
//    'coded' => true
//];
//echo Live::publish($publish)->toJson();die;

//开始直播：
//echo Live::startLive($channel_web_id)->toXml();die;

//获取直播状态
//echo Live::getLiveStatus($channel_web_id)->toXml();

//获取直播详情
//echo Live::getLiveDetail($channel_web_id)->toXml();

//获取直播列表
//echo Live::getLiveList(['channel_web_id' => $channel_web_id])->toXml();


//更新直播：
//$array = [
//    'channel_web_id' => $channel_web_id,
//    'title' => 'bbbb',
//];
//echo Live::updateLive($array)->toXml();

//直播地址：
echo Live::getLiveAddress($channel_web_id)->toJson();die;

//修改直播状态
$updateLiveStatus = [
    'channel_web_id' => $channel_web_id,
    'live_status' => 'broken'
];
echo Live::updateLiveStatus(['channel_web_id' => $channel_web_id])->toXml();

//结束直播：
//echo Live::stopLive($channel_web_id)->toXml();