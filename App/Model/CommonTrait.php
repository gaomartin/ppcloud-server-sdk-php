<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/28
 * Time: 16:12
 */

namespace App\Model;


trait CommonTrait {
    public function getInfoArray($json) {
        if (!$json) {
            return ['err' => -2, 'msg' => '接口未返回任何信息', 'data' => []];
        } else if((!($dataArray = json_decode($json, true))) || !array_key_exists('err', $dataArray)) {
            return ['err' => -3, 'msg' => '接口返回信息格式错误，可能是java接口服务器崩溃了', 'data' => []];
        }
        return $dataArray;
    }
}