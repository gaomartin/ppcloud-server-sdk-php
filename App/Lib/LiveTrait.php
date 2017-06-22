<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/27
 * Time: 16:19
 */
namespace App\Lib;
use App\Lib\CommonTrait;

trait LiveTrait {
    use CommonTrait;
    protected function checkArgs() {
        return !empty($this->all['title']) && !empty($this->all['mode']) && in_array($this->all['mode'], $this->modeOptionalArray) && !empty($this->all['start_time']) && !empty($this->all['end_time']);
    }
}