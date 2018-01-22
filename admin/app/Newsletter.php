<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter_subscriptions';

    protected $fillable = [
       'email','updated_at'
    ];

    protected $hidden = [
    	'id', 'subscribed', 'created_at', 'comment_unsubscribe'];
}
