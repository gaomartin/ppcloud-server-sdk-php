<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 15:57
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::getLiveAddress($_GET['channel_web_id'])->toJson();