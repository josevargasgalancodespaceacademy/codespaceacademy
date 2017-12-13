<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = 'company_contacts';

    protected $fillable = [
       'updated_at', 'state', 'observations'
    ];

    protected $hidden = [
    	'id', 'name', 'email', 'telephone', 'company_name', 'company_link', 'training_request', 'comment', 'created_at'];
}
