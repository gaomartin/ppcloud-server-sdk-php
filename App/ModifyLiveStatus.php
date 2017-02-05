<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/29
 * Time: 17:16
 *
 */

namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;
use App\Tools\ApiRequest;

class ModifyLiveStatus extends Common{
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id', 'live_status'];
    protected $apiKey = 'live-status-modify';
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    protected function getSendRequestData () {
        return $this->except(['channel_web_id']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest()));
    }
}