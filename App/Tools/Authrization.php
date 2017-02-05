<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/27
 * Time: 11:21
 */

namespace App\Tools;


class Authrization {
    public static function create($accessKey, $secretKey) {
        $json = json_encode(array(
            'rid' => md5(uniqid(mt_rand(), true)),
            'deadline' => time() + 86400 * 2,
        ));
        $encode_json = self::safe_base64encode($json);
        $sign = hash_hmac('sha1', $encode_json, $secretKey, true);
        $encode_sign = self::safe_base64encode($sign);
        $access_token = "{$accessKey}:{$encode_sign}:{$encode_json}";
        return $access_token;
    }
    public static function safe_base64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }
}