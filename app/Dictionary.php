<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    //
    protected $table = 'dictionaries';
    protected $fillable = [
        'term', 'language','translate_id',
    ];

    static public function translate( $term, $lan)
    {
        # code...
        $trans = Dictionary::where('term','=', $term)->first();
        if ($trans){
            $trans = Dictionary::where([
                ['translate_id', '=', $trans->id],
                ['language', '=', $lan],
            ])->first();
            return $trans->term;
        }else{
            return $term;
        }
    }
}
