<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertasTrabajo extends Model
{
    protected $table = 'work_offers';
    protected $fillable = [
       'updated_at', 'offer_type', 'min_experience', 'min_studies', 'min_salary', 'max_salary', 'num_vacant', 'industry_type', 'min_requirements', 'offer_short_description', 'offer_description', 'status' 
    ];

    protected $hidden = [
    	'id', 'name', 'city', 'business', 'created_at']; 
}
