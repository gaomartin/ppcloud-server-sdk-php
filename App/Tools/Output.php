<?php namespace App\Tools;
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2015/6/23
 * Time: 17:23
 */
class Output{
    const _JSON_ = 'json';
    const _XML_ = 'xml';
    const _ARRAY_ = 'array';
    const __DEFAULT_FORMAT_ = 'xml';
    private static $empty_result_array = [
        'data' => [],
        'err' => -1,
        'msg' => '接口未返回任何信息'
    ];
    private static $format_error_array = [
        'data' => [],
        'err' => -2,
        'msg' => '接口返回信息格式错误'
    ];
    public static $parameters_missing = [
        'data' => [],
        'err' => -3,
        'msg' => '缺少参数'
    ];
    public static $parameters_error = [
        'data' => [],
        'err' => -4,
        'msg' => '参数错误或者缺少参数'
    ];
    public static function getErrorParametersArray($data) {
        return [
            'data' => $data,
            'err' => -4,
            'msg' => '参数错误或者缺少参数'
        ];
    }
    public static function getSuccessParametersArray($data) {
        return [
            'data' => $data,
            'err' => 0,
            'msg' => '操作成功'
        ];
    }
    private static $mapArray = [];
    private static function getHeader($format) {
        $formatArray = [
            'json' => 'application/json',
            'xml' => 'text/xml'
        ];
        return [
            'Content-Type' => array_key_exists($format, $formatArray) ? $formatArray[$format] : $formatArray[self::__DEFAULT_FORMAT_],
            'Access-Control-Allow-Origin' => 'http://apitest.pptvyun.com'
        ];
    }

    public static function show(array $data = [], array $format = [], $convertFieldArray = [], callable $fun = null) {
        $convertFieldArray && $data = self::convertField($data, $convertFieldArray);
        $formatValue = 'xml';
        $cbValue = 'callback';
        array_key_exists('format', $format) && ($formatValue = $format['format']);
        array_key_exists('cb', $format) && ($cbValue = $format['cb']);
        $formatValue = strtolower($formatValue);
        $fun && $data = call_user_func_array($fun, [$data]);
        switch($formatValue) {
            case self::_JSON_:
                return self::showJson($data, $cbValue);
                break;
            case self::_XML_:
                return self::showXml($data);
            case self::_ARRAY_:
                return self::showArray($data);
            default:
                return null;
        }
    }
    public static function showXml($data){
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= self::arrayToXml2($data);
        $xml .= "</root>";
        header('Content-type: text/xml', false, 200);
        return $xml;
    }
    private static function arrayToXml($data) {
        $xml = "";
        foreach($data as $key => $value) {
            if (is_numeric($key)) {
                $xml .= "<item id='{$key}'>";
                $xml .= is_array($value) ?  self::arrayToXml($value) : "{$value}";
                $xml .= "</item>";
            } else {
                $xml .= "<{$key}>";
                $xml .= is_array($value) ? self::arrayToXml($value) : $value;
                $xml .= "</{$key}>";
            }
        }
        return $xml;
    }
    private static function arrayToXml2($data) {
        $xml = "";
        foreach($data as $key => $value) {
            is_numeric($key) ? ($xml .= "<item id='{$key}'>") : ($xml .= "<{$key}>");
            $xml .= is_array($value) ? self::arrayToXml($value) : $value;
            is_numeric($key) ? ($xml .= "</item>") : ($xml .= "</{$key}>");
        }
        return $xml;
    }
    public static function showJson($data, $cb) {
        $data = json_encode($data);
        strtolower($cb) != null && $data = $cb. '('. $data. ')';
        header('Content-type: application/json', false, 200);
        return $data;
    }
    public static function showArray($data) {
        return is_array($data) ?  $data : json_decode($data, true);
    }
//    private static function getFieldMap() {
//        if(empty(self::$mapArray)) {
//            $map = require_once __DIR__. '/FieldMap.php';
//            self::$mapArray = $map;
//        }
//        return self::$mapArray;
//    }
    public static function convertField(array $data, array $convertFieldArray) {
        $newData = [];
        foreach($data as $k => $v) {
            $value = is_array($v) ? self::convertField($v, $convertFieldArray) : $v;
            array_key_exists($k, $convertFieldArray) ? ($newData[$convertFieldArray[$k]] = $value) : ($newData[$k] = $value);
        }
        return $newData;
    }
}