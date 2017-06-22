<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/21
 * Time: 17:44
 */
require_once __DIR__. DIRECTORY_SEPARATOR. '..'. DIRECTORY_SEPARATOR. 'App'. DIRECTORY_SEPARATOR. 'Bootstrap'. DIRECTORY_SEPARATOR. 'app_init.php';
use App\Vod\UploadVod;
use App\Tools\Response;
$array = (new UploadVod(array_merge($_POST, ['getuptk' => 1])))->get()->toArray();
if (!$array['err'] && is_array($array['data']) && array_key_exists('up_token', $array['data'])) {
    $array['data']['upToken'] = $array['data']['up_token'];
    $array['data']['fId'] = $array['data']['fid'];
    unset($array['data']['up_token']);
    unset($array['data']['fid']);
}
echo (new Response($array))->toJson();