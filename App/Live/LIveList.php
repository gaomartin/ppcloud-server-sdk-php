<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/5
 * Time: 17:04
 */

namespace App\Live;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class LiveList extends Common {
    use CommonTrait;
    protected $apiKey = 'live-list';
    protected $defaultKeys = ['channel_web_id', 'key', 'category_id', 'ppfeatures', 'live_status', 'page_num', 'page_size', 'create_time_start', 'create_time_end'];
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get_for_authorization')));
    }
}