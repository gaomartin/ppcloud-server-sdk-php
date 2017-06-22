<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/9
 * Time: 17:01
 */

namespace App\Vod;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class ShieldVod extends Common {
    use CommonTrait;
    protected $defaultKeys = ['is_play', 'channel_web_ids'];
    protected $apiKey = 'vod-shield';
    protected function checkArgs() {
        return isset($this->all['is_play']) && isset($this->all['channel_web_ids']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}