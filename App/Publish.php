<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/28
 * Time: 15:25
 */

namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;

class Publish extends Common {
    use CommonTrait;
    protected $apiKey = 'publish';
    protected function getUrlReplacement() {
        return [$this->channel_web_id];
    }
    protected $defaultKeys = ['channel_web_id', 'coded'];
    protected function checkArgs() {
        return isset($this->all['channel_web_id']);
    }

    public function get() {
        return new Response($this->getInfoArray($this->sendRequest()));
    }
}