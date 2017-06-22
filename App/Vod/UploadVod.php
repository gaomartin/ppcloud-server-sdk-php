<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/2/21
 * Time: 18:00
 */

namespace App\Vod;
use App\Tools\Common;
use App\Tools\Response;
use App\Lib\CommonTrait;

class UploadVod extends Common {
    use CommonTrait;
    protected $defaultKeys = ['category_id', 'name', 'summary', 'cover_img', 'length', 'ppfeature', 'getuptk', 'reuse'];
    protected $apiKey = 'vod-upload';
    public function get() {
        return new Response($this->getInfoArray($this->sendRequest('send_post_for_authorization')));
    }
}