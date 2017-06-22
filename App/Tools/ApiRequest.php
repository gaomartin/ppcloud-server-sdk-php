<?php namespace App\Tools;

use App\Tools\Log;

class ApiRequest
{
    public static function send_json_post_for_authorization($url, $arr, $auth)
    {
        $json = json_encode($arr);
        $header = [
            "Authorization: $auth",
            'version: 3.0',
            'Content-Type: application/json',
            'Content-Length: '. strlen($json)
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 75);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $data = curl_exec($ch);
        curl_close($ch);
        Log::write(__FUNCTION__, $url, $arr, $data);
        return $data;
    }
    public static function send_post_for_authorization($url, $arr, $auth)
    {
        $json = json_encode($arr);
        $header = [
            "Authorization: $auth",
            'version: 3.0',
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arr));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 75);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $data = curl_exec($ch);
        curl_close($ch);
        Log::write(__FUNCTION__, $url, $arr, $data);
        return $data;
    }
    public static function send_post($url, array $post_data = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-type:application/x-www-form-urlencoded;charset=utf8', 'Content-length:'. strlen(is_array($post_data) ? http_build_query($post_data) : $post_data)]);
        $data = curl_exec($ch);
        curl_close($ch);
        self::showJavaApiInfo($data, $url, 'POST');
        return $data;
    }
    public static function upload_file($url, array $post_data = [])
    {
        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Disposition: form-data;Content-type:multipart/form-data;charset=utf8']);
        $data = curl_exec($ch);
        curl_close($ch);
        self::showJavaApiInfo($data, $url, 'POST');
        return $data;
    }
    public static function upload_file2($url, array $post_data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Disposition: form-data;Content-type:multipart/form-data;charset=utf8']);
        curl_setopt($ch,CURLOPT_HEADER,false);
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
//        dd($httpCode);
        curl_close($ch);
        self::showJavaApiInfo($data, $url, 'POST');
        return ['data' => $data, 'info' => $httpCode];
    }
    public static function send($url, array $post_data = [], $medhod = 'PUT')
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $medhod);
        $post_data && curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);     //这里直接传数组要好一些。不需要http_build_query
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["content-type:application/x-www-form-urlencoded;charset=utf8;", 'Content-length:'. strlen(http_build_query($post_data))]);
        $data = curl_exec($ch);
        curl_close($ch);
        self::showJavaApiInfo($data, $url, $medhod);
        return $data;
    }


    public static function send_json_post($url,$post_data)
    {
        is_array($post_data) && $post_data = json_encode($post_data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($post_data))
        );
        $data = curl_exec($ch);
        curl_close($ch);
        self::showJavaApiInfo($data, $url, 'JSON_POST');
        return $data;
    }
    public static function send_get($url, array $data = [])
    {
        $url = $url. '?'. http_build_query($data);
        $header = array('Expect:');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        curl_close( $ch );
        Log::write(__FUNCTION__, $url, [], $retData);

        return $retData;
    }
    public static function send_get_for_authorization($url, $data = [], $auth)
    {
        $header = [
            "Authorization: $auth",
            'version: 3.0',
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        $data && $url = $url. '?'. http_build_query($data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        curl_close( $ch );
        self::showJavaApiInfo($retData, $url, 'GET');
        Log::write(__FUNCTION__, $url, $data, $retData);
        return $retData;
    }
    public static function send_get_for_authorization2($url, $data = [], $auth)
    {
        $header = [
            "Authorization: $auth",
            'version: 3.0'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        curl_close( $ch );
        self::showJavaApiInfo($retData, $url, 'GET');
        Log::write(__FUNCTION__, $url, $data, $retData);
        return $retData;
    }
    public static function send_get_xml($url)
    {
        $header = array('Expect:');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-type:application/xml;charset=utf8']);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        curl_close( $ch );
        self::showJavaApiInfo($retData, $url, 'XML_GET');
        return $retData;
    }
    public static function send_delete($url)
    {
        $header = array('Expect:');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $output = curl_exec($ch);
        curl_close($ch);
        self::showJavaApiInfo($output, $url, 'DELETE');
        return $output;
    }

    public static function https_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	//绂佹鐩存帴鏄剧ず鑾峰彇鐨勫唴瀹� 閲嶈
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 	//涓嶉獙璇佽瘉涔︿笅鍚�
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $json = curl_exec($ch);
        self::showJavaApiInfo($json, $url, 'HTTPS_GET');
        return $json;
    }
    public static function showJavaApiInfo($apiData = '', $url = '', $method = '')
    {
        if (array_key_exists('ppdebug', $_GET) && ($_GET['ppdebug'] == 'oPYp47vznEaRBzgNpUAjnQ==')) {
            $arr = ['apiData' => $apiData];
            $url && ($arr = array_merge($arr, ['url' => $url]));
            $method && ($arr = array_merge($arr, ['method' => $method]));
            abort(501, json_encode($arr));
        }
    }
    public static function http_send_get_result($url)
    {
        $header = array('Expect:');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $retData = curl_exec( $ch );
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        self::showJavaApiInfo($retData, $url, 'GET');
        return ['content' => $retData, 'status' => $http_status];
    }
}