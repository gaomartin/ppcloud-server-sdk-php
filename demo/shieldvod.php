<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/13
 * Time: 17:21
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Vod\ShieldVod;
echo (new ShieldVod(['channel_web_ids' => '0a2dnq6cqKWemqmL4K2fnK2cp-yem6eVpaSj', 'is_play' => '0']))->get()->toXml();