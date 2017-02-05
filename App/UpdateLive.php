<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 17:30
 */

namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;

class UpdateLive extends Common {
    use CommonTrait;
    protected $apiKey = 'live-update';
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    protected $defaultKeys = ['channel_web_id', 'title', 'intro', 'cover_url', 'mode', 'external_url', 'start_time', 'end_time'];
    protected function checkArgs() {
        return isset($this->all['channel_web_id']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest()));
    }
}