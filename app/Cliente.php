<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'an8', 'alph', 'acl', 'gcp', 'tax'
    ];
}