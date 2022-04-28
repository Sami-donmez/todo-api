<?php

namespace App\Utils;

class TodoStatus
{
    const CREATED = 0;
    const COMPLATE = 1;
    const IN_WAITING = 2;
    public static $status=[
        self::CREATED,self::IN_WAITING,self::COMPLATE
    ];
    public static  $string = [
        self::CREATED => "Oluşturuldu",
        self::COMPLATE => "Tamamlandı",
        self::IN_WAITING=>"Beklemede"
    ];

    public static function getStatusName($status){
        if (isset(self::$string[$status])) {
            return self::$string[$status];
        }
        return "";
    }

}
