<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/5
 * Time: 17:12
 */
require_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\autoload.php');
use App\Live;
echo Live::getLiveList($_GET)->toXml();