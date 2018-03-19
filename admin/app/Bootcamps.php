<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bootcamps extends Model
{
    protected $table = 'bootcamps';

    protected $fillable = [
       'name','updated_at'
    ];

    protected $hidden = [
    	'id'];
}
