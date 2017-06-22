<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 17:58
 */

namespace App\Live;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class LiveDetail extends Common {
    use CommonTrait;
    protected $apiKey = 'live-detail';
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    protected $defaultKeys = ['channel_web_id'];
    protected function checkArgs() {
        return isset($this->all['channel_web_id']);
    }

    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get_for_authorization')));
    }
}