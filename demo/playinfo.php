<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/29
 * Time: 15:34
 */
//这个java接口暂时没有开放，无法使用。
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Live\PlayInfo;


echo (new PlayInfo('0a2dnq6coaijmaeL4K2fnK2cp-yema2cpail'))->get()->toXml();