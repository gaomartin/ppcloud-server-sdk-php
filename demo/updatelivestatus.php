<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/13
 * Time: 16:06
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Live\Live;
echo Live::updateLiveStatus(array_merge($_GET, $_POST))->toJson();