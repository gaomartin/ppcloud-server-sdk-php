<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/9
 * Time: 17:01
 */

namespace App\Vod;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class DeleteCategory extends Common {
    use CommonTrait;
    protected $defaultKeys = ['category_id'];
    protected $apiKey = 'delete-category';
    protected function checkArgs() {
        return isset($this->all['category_id']);
    }
    protected function getUrlReplacement() {
        return [$this->all['category_id']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}