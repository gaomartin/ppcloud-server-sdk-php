<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/28
 * Time: 10:13
 */
namespace App;
include_once str_replace('\\', DIRECTORY_SEPARATOR, '..\App\Bootstrap\helper.php');
use App\Tools\Common;
use App\Tools\Response;
use App\Model\CommonTrait;

class CreateLive extends Common {
    use CommonTrait;
    protected $defaultKeys = ['title', 'intro', 'cover_url', 'mode', 'external_url', 'start_time', 'end_time', 'watch_delay', 'to_vod', 'time_shifting'];
    protected $apiKey = 'create-live';
    protected $modeOptionalArray = ['camera', 'xsplit', 'rtmp'];
    protected function checkArgs() {
        return isset($this->all['title']) && isset($this->all['mode']) && in_array($this->all['mode'], $this->modeOptionalArray) && isset($this->all['start_time']) && isset($this->all['end_time']);
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest()));
    }
}