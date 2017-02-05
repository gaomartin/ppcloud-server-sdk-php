<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/13
 * Time: 15:40
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::startLive($_GET['channel_web_id'])->toXml();