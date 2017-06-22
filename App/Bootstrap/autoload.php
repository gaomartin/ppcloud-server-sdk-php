<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2016/12/22
 * Time: 11:52
 */
class ClassLoader
{
    public static function loader($classname)
    {
        $classname = strtr($classname, ['\\' => DS]);
        $class_file = ROOT_PATH. $classname. ".php";
        if (file_exists($class_file)){
            require_once($class_file);
        } else {
            die("ClassFileAutoloadException,filename:$class_file<br />");
        }
    }
}
spl_autoload_register('ClassLoader::loader');