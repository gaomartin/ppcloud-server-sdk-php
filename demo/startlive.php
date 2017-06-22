<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/13
 * Time: 15:40
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Live\Live;
echo Live::startLive($_GET['channel_web_id'] ?: $_POST['channel_web_id'])->toXml();