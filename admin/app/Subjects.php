<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
       'name','bootcamp_id','updated_at' 
    ];

    protected $hidden = [
    	'id'];
}
