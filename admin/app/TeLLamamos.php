<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeLLamamos extends Model
{
    protected $table = 'information_phone_number';

    protected $fillable = [
       'updated_at', 'state', 'observations'
    ];

    protected $hidden = [
    	'id', 'name', 'telephone', 'created_at'];
}
