<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'information_contact';

    protected $fillable = [
       'updated_at'
    ];

    protected $hidden = [
    	'id', 'name', 'email', 'telephone', 'comment', 'created_at'];
}
}
