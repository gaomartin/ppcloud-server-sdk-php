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

class UpdateVod extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id', 'channel_name', 'channel_summary', 'cover_image'];
    protected $apiKey = 'vod-update';
    protected function getUrlReplacement() {
        return [$this->all['channel_web_id']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}