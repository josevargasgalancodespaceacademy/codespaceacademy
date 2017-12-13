<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletter_subscriptions';

    protected $fillable = [
       'updated_at'
    ];

    protected $hidden = [
    	'id', 'email', 'subscribed', 'created_at', 'comment_unsubscribe'];
}
