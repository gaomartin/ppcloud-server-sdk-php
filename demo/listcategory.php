<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/9
 * Time: 17:05
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Vod\ListCategory;
header('content-type:text/html;charset=utf8');
dd((new ListCategory())->get()->toArray());