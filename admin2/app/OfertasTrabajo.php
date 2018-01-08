<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertasTrabajo extends Model
{
    protected $table = 'work_offers';
    protected $fillable = [
       'updated_at', 'offer_type', 'name', 'city', 'business', 'min_experience', 'min_studies', 'min_salary', 'max_salary', 'num_vacant', 'industry_type', 'min_requirements', 'offer_short_description', 'offer_description', 'status' 
    ];

    protected $hidden = [
    	'id', 'created_at']; 
}
