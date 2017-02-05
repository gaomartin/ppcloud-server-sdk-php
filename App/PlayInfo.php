<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/29
 * Time: 15:25
 */

namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;
use App\Tools\ApiRequest;
//use App\Model\LiveModel;

class PlayInfo extends Common {
    use CommonTrait;
    protected $defaultKeys = ['channel_web_id'];
    protected $apiKey = 'play-info';
    public function __construct($channelWebId) {
        $this->channel_web_id = $channelWebId;
    }
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_get_for_authorization2')));
    }
}