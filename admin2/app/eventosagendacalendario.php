<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventosagendacalendario extends Model
{
    protected $table = 'eventosagendacalendario';

    protected $fillable = [
        'date_start', 'date_end', 'all_day', 'color', 'title'
    ];

    protected $hidden = ['id'];

}
