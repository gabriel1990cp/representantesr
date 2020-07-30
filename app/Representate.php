<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representate extends Model
{
    protected $table = 'representates';

    protected $fillable = [
        'an8', 'alph', 'optf'
    ];
}
