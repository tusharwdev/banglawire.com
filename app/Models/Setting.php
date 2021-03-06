<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getByname($name,$default = null)
    {
        $setting = self::where('name', $name)->first();
        if (isset($setting)) {
            return $setting->value;
        }
        return $default;
    }

}
