<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'work_offers';

    protected $fillable = [
       'name', 'city', 'business', 'offer_type', 'min_experience', 'status', 'min_studies', 'min_salary', 'max_salary', 'num_vacant', 'industry_type', 'offer_short_description',
       'offer_description', 'status', 'updated_at'
    ];

    protected $hidden = ['id'];
}
}
