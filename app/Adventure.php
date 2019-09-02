<?php
//DACDUQ COMMENT
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
    protected $table = 'adventures';
    protected $fillable = ['name'];
}
