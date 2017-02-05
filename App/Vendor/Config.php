<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/27
 * Time: 11:22
 */

namespace App\Vendor;


class Config {
    private $configPath;
    public function __construct() {
        $this->configPath = root_path(). 'config/';
    }
    public function getConfig($configFile) {
        if (property_exists($this, $configFile))
            return $this->$configFile;
        if (is_file($file = $this->configPath. $configFile. '.php')) {
            return ($this->$configFile = include_once $file);
        }
        return [];
    }
}