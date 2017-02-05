<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/27
 * Time: 12:01
 */
$host = 'http://svc.pptvyun.com/';
return [
    'create-live' => $host. 'svc/api3/live',
    'publish' => $host. 'svc/api3/live/{channel_web_id}/publish', ///svc/api3/live/<channel_web_id>/publish
    'play-info' => $host. 'svc/api3/playstr/{channel_web_id}',    ///svc/api3/playstr/<channel_web_id>
    'live-status-modify' => $host. 'svc/api3/live/{channel_web_id}/livestatus',  ///svc/api3/live/<channel_web_id>/livestatus
    'live-status-fetch' => $host. 'svc/api3/live/{channel_web_id}/livestatus',
    'live-update' => $host. 'svc/api3/live/{channel_web_id}',  //8.8.编辑视频信息接口
    'live-detail' => $host. 'svc/api3/channel/{channel_web_id}', //8.6.获取单个视频接口
    'live-list' => $host. 'svc/api3/channel/list' //8.7 视频列表接口
];