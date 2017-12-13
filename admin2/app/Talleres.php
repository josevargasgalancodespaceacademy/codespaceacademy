<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    protected $table = 'talleres';

    protected $fillable = [
       'updated_at', 'state', 'observations'
    ];

    protected $hidden = [
    	'id', 'name', 'type_identification', 'number_identification', 'telephone', 'email', 'company_name', 'company_link', 'created_at'];
}
}
