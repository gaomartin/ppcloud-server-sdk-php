<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/28
 * Time: 12:09
 */

namespace App\Tools;
use App\Tools\Output;

class Response {
    public function __construct($data) {
        $this->dataArray = $data;
    }
    public function toArray() {
        return $this->dataArray;
    }
    public function toJson($cb = null) {
        return Output::showJson($this->dataArray, $cb);
    }
    public function toXml() {
        return Output::showXml($this->dataArray);
    }
}