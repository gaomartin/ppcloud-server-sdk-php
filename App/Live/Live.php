<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/5
 * Time: 17:37
 */

namespace App\Live;
//require_once '..\App\Bootstrap\autoload.php';
use App\Live\CreateLive;
use App\Live\Publish;
use App\Live\ModifyLiveStatus;
use App\Live\FetchLiveStatus;
use App\Live\LiveDetail;
use App\Live\LIveList;
use App\Live\UpdateLive;
use App\Live\PlayInfo;

class Live
{
    //创建直播
    public static function createLive(array $array) {
            return (new CreateLive($array))->get();
    }
    //请求推流地址
    public static function publish($array) {
        return (new Publish($array))->get();
    }
    //开始直播
    public static function startLive($channel_web_id) {
        $arr = ['channel_web_id' => $channel_web_id, 'live_status' => 'living'];
        return (new ModifyLiveStatus($arr))->get();
    }
    //获取直播状态
    public static function getLiveStatus($channel_web_id) {
        $arr = ['channel_web_id' => $channel_web_id];
        return (new FetchLiveStatus($arr))->get();
    }
    //直播详情(8.6.获取单个视频接口)
    public static function getLiveDetail($channel_web_id) {
        $arr = ['channel_web_id' => $channel_web_id];
        return (new LiveDetail($arr))->get();
    }
    //直播列表
    public static function getLiveList(array $array) {
        return (new LIveList($array))->get();
    }
    //修改直播状态
    public static function updateLiveStatus($arr) {
        return (new ModifyLiveStatus($arr))->get();
    }
    //结束直播
    public static function stopLive($channel_web_id) {
        $arr = ['channel_web_id' => $channel_web_id, 'live_status' => 'stopped'];
        return (new ModifyLiveStatus($arr))->get();
    }
    //更新直播
    public static function updateLive($arr) {
        return (new UpdateLive($arr))->get();
    }
    //获取直播地址
    public static function getLiveAddress($channel_web_id) {
        return (new PlayInfo($channel_web_id))->get();
    }
}