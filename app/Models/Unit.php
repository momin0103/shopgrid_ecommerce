<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    private static $unit;
    private static  $units;

    public static function saveBasicInfo($unit, $request)
    {
        $unit->name           = $request->name;
        $unit->description    = $request->description;
        $unit->save();
    }

    public static function newUnit($request)
    {
       Unit::saveBasicInfo(new Unit(), $request);
    }

    public static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        Unit::saveBasicInfo(self::$unit, $request);
    }
    public static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }

}
