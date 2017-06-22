<?php

/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/5/4
 * Time: 17:46
 */
namespace App\Key;
use App\Tools\Authrization;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;
use App\Tools\Log;
class Key extends Common
{
    use CommonTrait;
    public function __construct()
    {
        if (!$this->checkArgs()) {
            header('Content-type:text/html;charset=utf8');
            die("AccessKey和SecretKey不存在！");
        }
        $this->key = config('key');
    }
    public function composeHeader() {
        return [
            "appid:{$this->key['AccessKey']}",
            "appsecret:{$this->key['SecretKey']}",
            'version:3.0',
        ];
    }
    public function send_get_for_authorization($url, $header)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        curl_close( $ch );
        Log::write(__FUNCTION__, $url, [], $retData);
        return $retData;
    }
    protected function sendRequest($sendMethod = 'send_json_post_for_authorization') {
        return $this->send_get_for_authorization($this->getApi(), $this->composeHeader());
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest()));
    }
    protected function checkArgs() {
        return isset(config('key')['AccessKey']) && isset(config('key')['SecretKey']);
    }
    protected $apiKey = 'check-key';

    public function getAccessTokenByKey() {
        return $this->get();
    }
}