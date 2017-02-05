<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/4
 * Time: 15:55
 */

namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;
use App\Tools\ApiRequest;

class FetchLiveStatus extends Common{
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id'];
    protected $apiKey = 'live-status-fetch';
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    protected function getSendRequestData () {
        return $this->except(['channel_web_id']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get_for_authorization')));
    }
}