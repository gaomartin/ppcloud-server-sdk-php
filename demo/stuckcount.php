<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/22
 * Time: 17:56
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Statistics\LiveStuckcount;
echo (new LiveStuckcount(['channel_web_id' => '0a2dnq6cqaCcoq-L4K2fnK2cp-yem6iVo6Oh']))->get()->toXml();