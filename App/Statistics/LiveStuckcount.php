<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/23
 * Time: 15:28
 */

namespace App\Statistics;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class LiveStuckcount extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id', 'start_time', 'end_time', 'page_num', 'page_size'];
    protected $apiKey = 'live-stuckcount';
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