<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/23
 * Time: 15:52
 */

namespace App\Statistics;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class LiveUV extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id', 'start_date', 'end_date', 'page_num', 'page_size'];
    protected $apiKey = 'live-uv';
    protected function checkArgs() {
        return isset($this->all['channel_web_id']) && isset($this->all['start_date']) && isset($this->all['end_date']);
    }
    protected function getUrlReplacement() {
        return [$this->all['channel_web_id']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}