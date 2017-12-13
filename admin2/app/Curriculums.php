<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculums extends Model
{
    protected $table = 'curriculums';

    protected $fillable = [
       'updated_at'
    ];

    protected $hidden = [
    	'id', 'name', 'email', 'telephone', 'website', 'linkedin', 'route_curriculum_pdf', 'created_at'];
}
}
