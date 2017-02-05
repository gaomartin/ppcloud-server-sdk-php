<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/1/10
 * Time: 14:44
 */

namespace App\Tools;


class Log
{
    const DEFAULT_TIMEZONE = "PRC";
    private static $config;
    private static function getConfig($key = null) {
        if (!isset(self::$config))  {
            self::$config = config('log');
        }
        return $key ? (array_key_exists($key, self::$config) ?  self::$config[$key] : null) : self::$config;
    }
    private static function getLogFileName() {
        return app_path(). self::getConfig()['log-storage']. DS. date(self::getConfig()['log-file-format'], time()). self::getConfig()['log-file-extenssion'];
    }
    private static function createFile() {
        $file = self::getLogFileName();
        return fopen($file, "a");
    }
    private static function getContent($requestMethod, $url, array $requestData = [], $responseData = null) {
        $content = 'rquest time: '. date('Y-m-d H:i:s'). PHP_EOL;
        $content .= 'rquest url: '. $url. PHP_EOL;
        $content .= "request method: ". $requestMethod. PHP_EOL;
        $content .= "request data: ". self::arrayToString($requestData). PHP_EOL;
        $content .= "response info: ". $responseData. PHP_EOL;
        return $content. PHP_EOL;
    }
    private static function arrayToString(array $array) {
        $str = '';
        foreach ($array as $k => $v) {
            $str .= "$k=$v&";
        }
        $str = rtrim($str, '&');
        return $str;
    }
    private static function setTimezone() {
        $timezone = self::getConfig('log-file-timezone') ?: self::DEFAULT_TIMEZONE;
        date_default_timezone_set($timezone);
    }
    public static function write($requestMethod, $url, array $requestData = [], $responseData = null) {
        if (self::getConfig('log')) {
            self::setTimezone();
            $file = self::createFile();
            $content = self::getContent($requestMethod, $url, $requestData, $responseData);
            fwrite($file, $content);
        }
    }
}