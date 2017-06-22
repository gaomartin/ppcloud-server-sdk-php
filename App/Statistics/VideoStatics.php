<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/22
 * Time: 17:48
 */
namespace App\Statistics;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class VideoStatics extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id'];
    protected $apiKey = 'vv';
    protected function checkArgs() {
        return isset($this->all['channel_web_id']);
    }
    protected function getUrlReplacement() {
        return [$this->all['channel_web_id']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}