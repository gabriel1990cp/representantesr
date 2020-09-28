<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    protected $table = 'transportadoras';

    protected $fillable = [
        'an8', 'alph', 'ph1', 'tax'
    ];
}
