<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 18:00
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::getLiveDetail($_GET['channel_web_id'])->toXml();