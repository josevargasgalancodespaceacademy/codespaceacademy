<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SorteoBecas extends Model
{
    protected $table = 'promotion_entries';

    protected $fillable = [
       'updated_at', 'state', 'observations'
    ];

    protected $hidden = [
    	'id', 'name', 'surnames', 'date_of_birth', 'email', 'type_identification', 'number_identification', 'telephone', 'city', 'comment', 'created_at'];
}
}
