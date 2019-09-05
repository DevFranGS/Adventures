<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */

    public static function duplicate($num)
    {
        # code...
        return $num + $num;
    }

    protected $table = 'adventures';
    protected $fillable = ['name'];


}
