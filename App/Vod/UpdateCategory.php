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

class UpdateCategory extends Common {
    use CommonTrait;
    protected $defaultKeys = ['category_name', 'category_id'];
    protected $apiKey = 'update-category';
    protected function checkArgs() {
        return isset($this->all['category_name']) && isset($this->all['category_id']);
    }
    protected function getUrlReplacement() {
        return [$this->all['category_id']];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}