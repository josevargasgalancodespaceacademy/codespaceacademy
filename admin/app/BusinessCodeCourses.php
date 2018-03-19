<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCodeCourses extends Model
{
    protected $table = 'business_code_courses';

    protected $fillable = [
       'name','updated_at'
    ];

    protected $hidden = [
    	'id'];
}
