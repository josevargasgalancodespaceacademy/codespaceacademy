<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumsOfertasTrabajo extends Model
{
        protected $table = 'work_offers_curriculums';

    protected $fillable = [
       'updated_at'
    ];

    protected $hidden = [
    	'id', 'name', 'email', 'telephone', 'website', 'linkedin', 'route_curriculum_pdf', 'offer_id', 'created_at'];
}
