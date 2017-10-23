<?php

namespace App\Models;

class NewsletterSubscriber extends BaseModel
{
  	protected $table = 'newsletter_subscriptions';
    public $pageTemplate = 'adminarea/newsletters.twig';
    public $tableTemplate = 'adminarea/partials/newsletters_table.twig';
    public $tableRowTemplate = 'adminarea/partials/newsletters_row.twig';

  	/**
	 * Defines relationship - belongs to one contact
	 * NewsletterSubscriber::with('contact')->get();
	 *
	 * @return {model} $contact
	 */

  	public function contact()
    {
        return $this->belongsTo('App\Models\Contact','email','email');
    }

}