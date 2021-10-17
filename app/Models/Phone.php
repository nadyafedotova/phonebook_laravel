<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'phone',
        'last_name'
    ];


    public static function sorted()
    {

        return Phone::orderBy('phone')->paginate(15);
    }

    /**
     * @return mixed
     */
    public static function countPhone()
    {
        return Phone::count();
    }
}
