<?php
namespace App\Traits;
trait StatusTrait{
    public static function active(){
       return self::where('status',1);
    }
}
