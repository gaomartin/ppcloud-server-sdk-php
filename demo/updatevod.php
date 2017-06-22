<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/22
 * Time: 16:19
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Vod\UpdateVod;
echo (new UpdateVod(['channel_web_id' => '0a2dnq6cp6elm6qL4K2fnK2cp-yemq-aqaWj', 'channel_name' => 'abcd']))->get()->toXml();