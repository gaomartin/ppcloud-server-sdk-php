<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/27
 * Time: 12:01
 */
$host = 'http://svc.pptvyun.com/';
$qahost = 'http://svc.pptvyun.ppqa.com/';
return [
    'create-live' => $host. 'svc/api3/live',
    'publish' => $host. 'svc/api3/live/{channel_web_id}/publish', ///svc/api3/live/<channel_web_id>/publish
    'play-info' => $host. 'svc/api3/playstr/{channel_web_id}',    ///svc/api3/playstr/<channel_web_id>
    'live-status-modify' => $host. 'svc/api3/live/{channel_web_id}/livestatus',  ///svc/api3/live/<channel_web_id>/livestatus
    'live-status-fetch' => $host. 'svc/api3/live/{channel_web_id}/livestatus',
    'live-update' => $host. 'svc/api3/live/{channel_web_id}',  // 9.2.修改直播详情
    'live-detail' => $host. 'svc/api3/channel/{channel_web_id}', //8.6.获取单个视频接口 get
    'live-list' => $host. 'svc/api3/channel/list', //8.7 视频列表接口

    'create-category' => $host. 'svc/api3/category',
    'update-category' => $host. 'svc/api3/category/{category_id}',
    'delete-category' => $host. 'svc/api3/category/{category_id}/delete',
    'list-category' => $host. 'svc/api3/category/list',
    'vod-update' => $host. 'svc/api3/channel/{channel_web_id}',   //8.8编辑视频信息接口 post
    'vod-shield' => $host. 'svc/api3/channel/playable',
    'vod-delete' => $host. 'svc/api3/channel/delete',
    'vod-upload' => $host. 'svc/api3/channel',

    'check-key' => $host. 'svc/api3/auth/token',
    //统计接口
    'vv' => $host. 'svc/api3/channel/vv/{channel_web_id}',
    'live-stuckcount' => $host. 'svc/api3/live/{channel_web_id}/stuckcount',
    'live-uv' => $host. 'svc/api3/live/{channel_web_id}/online/uv',
    'video-realtime-detaillist' => $host. 'svc/private/v1/statistics/realTime/detailList',
    'video-vv-total' => $host. 'svc/private/v1/statistics/realTime/{userid}',
];