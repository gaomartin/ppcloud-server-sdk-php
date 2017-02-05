<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/22
 * Time: 15:56
 */
include_once __DIR__ . DIRECTORY_SEPARATOR. 'autoload.php';
use App\Vendor\Config;
define('DS', DIRECTORY_SEPARATOR);
if (!function_exists('config')) {
    function config($key){
        static $config = [];
        if (!isset($config[$key])) {
            $config[$key] = (new Config())->getConfig($key);
        }
        return $config[$key];
    }
}
if (!function_exists('app_path')) {
    function app_path() {
        return __DIR__. DS. '..'. DS;
    }
}
if (!function_exists('root_path')) {
    function root_path() {
        return __DIR__. DS. '..'. DS;
    }
}
if (!function_exists('dd')) {
    function dd($val) {
        echo "<pre>";
        foreach (func_get_args() as $v) {
            if (is_array($v)) {
                print_r($v);
            } else if (is_object($v)) {
                var_dump($v);
            } else {
                echo $v;
            }
        }
        echo "</pre>";
        die;
    }
}