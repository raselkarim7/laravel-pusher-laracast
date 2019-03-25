<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'id', 'body',
    ];


    // public function
    //return $this->hasOne('App\Phone', 'foreign_key');

}
