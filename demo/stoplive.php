<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/13
 * Time: 16:07
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::stopLive($_GET['channel_web_id'])->toXml();