<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 16:47
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::getLiveStatus($_GET['channel_web_id'])->toXml();