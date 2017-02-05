<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/28
 * Time: 10:55
 */

namespace App\Tools;
use App\Tools\Authrization;
use App\Tools\ApiRequest;
use App\Tools\Log;

class Common {
    protected $defaultKeys = [];
    private $urlPattern = '/{[a-z_]+}/i';
    protected $all = [];
    protected $apiKey = null;
    protected $apiUrl = '';
    public function __construct(array $array = []) {
        foreach($array as $key => $val) {
            if (in_array($key, $this->defaultKeys)) {
                $this->all[$key] = $val;
                $this->$key = $val;
            }
        }
    }
    public function getAllParams() {
        return $this->all;
    }
    protected function getSendRequestData () {
        return isset($this->all) ? $this->all : [];
    }
    protected function getApi() {
        if (is_callable([$this, 'getUrlReplacement'])) {
            return $this->composeUrl(config('api')[$this->apiKey], $this->getUrlReplacement());
        }
        return config('api')[$this->apiKey];
    }
    protected function getAccessToken() {
        return Authrization::create(config('key')['AccessKey'], config('key')['SecretKey']);
    }
    protected function sendRequest($sendMethod = 'send_json_post_for_authorization') {
        if (is_callable([$this, 'checkArgs']) && !$this->checkArgs()) {
            $returnData = json_encode([
                'err' => '-1',
                'msg' => '缺少必要参数或者参数错误！',
                'data' => []
            ]);
            Log::write($sendMethod, $this->getApi(), $this->getSendRequestData(), $returnData);
            return $returnData;
        }
        return ApiRequest::$sendMethod($this->getApi(), $this->getSendRequestData(), $this->getAccessToken());
    }
    public function __get($property) {
        return property_exists($this, $property) ? $this->$property : null;
    }
    protected function except(array $except = []) {
        $arr = [];
        foreach($this->all as $key => $val) {
            !in_array($key, $except) && $arr[$key] = $val;
        }
        return $arr;
    }
    private function getPattern() {
        return $this->urlPattern;
    }
    private function composeUrl($host, array $replacement = []) {
        $pattern = $this->getPattern();
        $matchCount = 0;
        if (!$pattern || !$replacement) {
            return $host;
        }
        $matchArray = [];
        preg_match_all($pattern, $host, $matchArray);
        $matchCount = count($matchArray[0]);
        if (!$matchCount) {
            return $host;
        }
        if ($matchCount == 1) {
            return preg_replace($pattern, $replacement[0], $host);
        } else {
            $patternArray = [];
            for($i = 0; $i < $matchCount; $i++) {
                $patternArray[$i] = $pattern;
            }
            return preg_replace($patternArray, $replacement, $host, 1);
        }
    }
}