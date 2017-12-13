<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasInformacion extends Model
{
    protected $table = 'information_requests';

    protected $fillable = [
       'updated_at', 'state', 'observations'
    ];

    protected $hidden = [
    	'id', 'name', 'email', 'telephone', 'city', 'course', 'comment', 'created_at'];
}
}
