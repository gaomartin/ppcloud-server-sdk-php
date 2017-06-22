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

class CreateCategory extends Common {
    use CommonTrait;
    protected $defaultKeys = ['category_name'];
    protected $apiKey = 'create-category';
    public function __construct($categoryName) {
        $this->category_name = $categoryName;
    }
    public function getSendRequestData() {
        return ['category_name' => $this->category_name];
    }
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}