<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = [
       'event_name', 'event_type', 'event_date', 'event_hour', 'event_description', 'event_url', 'created_at', 'updated_at'
    ];

    protected $hidden = ['id'];
}
