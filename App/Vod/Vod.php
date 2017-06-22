<?php
/**
 * Created by PhpStorm.
 * User: huazhouzhang
 * Date: 2017/3/17
 * Time: 14:14
 */

namespace App\Vod;
use App\Vod\ListCategory;
use App\Vod\CreateCategory;
use App\Vod\UpdateCategory;
use App\Vod\DeleteCategory;
use App\Vod\VodDelete;

class Vod
{
    public static function listCategory() {
        return (new ListCategory())->get();
    }
    public static function createCategory($name) {
        return (new CreateCategory($name))->get();
    }
    public static function updateCategory(array $arr) {
        return (new UpdateCategory($arr))->get();
    }
    public static function deleteCategory(array $arr) {
        return (new DeleteCategory($arr))->get();
    }
    public static function updateVod(array $arr) {
        return (new UpdateVod($arr))->get();
    }
    public static function shieldVod(array $arr) {
        return (new ShieldVod($arr))->get();
    }
    public static function deleteVod(array $arr) {
        return (new VodDelete($arr))->get();
    }
}