<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/23
 * Time: 17:37
 */
namespace App\Statistics;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class VideoVVTotal extends Common {
    use CommonTrait;
    protected $defaultKeys = ['userid', 'channelid', 'starttime', 'endtime'];
    protected $apiKey = 'video-vv-total';
    protected function checkArgs() {
        return isset($this->all['userid']) && isset($this->all['starttime']) && isset($this->all['endtime']);
    }
    protected function getUrlReplacement() {
        return [$this->all['userid']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get')));
    }
}