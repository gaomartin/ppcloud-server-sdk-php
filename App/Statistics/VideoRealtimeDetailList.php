<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/23
 * Time: 16:32
 */

namespace App\Statistics;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class VideoRealtimeDetailList extends Common {
    use CommonTrait;
    protected $defaultKeys = ['userid', 'channelid', 'starttime', 'endtime', 'pagenum', 'pagesize'];
    protected $apiKey = 'video-realtime-detaillist';
    protected function checkArgs() {
        return isset($this->all['userid']) && isset($this->all['starttime']) && isset($this->all['endtime']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get')));
    }
}