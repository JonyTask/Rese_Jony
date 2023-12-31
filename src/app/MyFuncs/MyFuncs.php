<?php

namespace App\MyFuncs;

class MyFuncs
{
    public static function CreateArray($array):array
    {
        $counts = $array->count();
        $GourmetIdArray = [];
        for($start=0;$start<$counts;$start++){
            array_push($GourmetIdArray,$array[$start]["gourmet_id"]);
        }
        return $GourmetIdArray;
    }
}