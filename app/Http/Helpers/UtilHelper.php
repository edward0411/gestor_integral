<?php

namespace App\Http\Helpers;


class UtilHelper
{
    static function saveFile($path, $file){
        $name = $file->getClientOriginalName();
        $path = public_path() .$path;
        $file->move($path, $name);
        return $name;
    }
}
