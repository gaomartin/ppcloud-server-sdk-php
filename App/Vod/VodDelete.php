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

class VodDelete extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_ids'];
    protected $apiKey = 'vod-delete';
    protected function checkArgs() {
        return isset($this->all['channel_web_ids']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}