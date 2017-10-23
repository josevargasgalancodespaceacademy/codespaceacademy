<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

	protected $table = 'contacts';

    /**
     * Defines relationship - has many company contacts
     * Contact::with('companyContacts')->get();
     *
     * @return {model(s)} 
     */

	public function companyContacts()
    {
        return $this->hasMany('App\Models\CompanyContact','email','email');
    }

    /**
     * Defines relationship - has many curriculums
     * Contact::with('curriculums')->get();
     *
     * @return {model(s)} 
     */

    public function curriculums()
    {
        return $this->hasMany('App\Models\Curriculum','email','email');
    }

    /**
     * Defines relationship - has one newsletter subscription
     * Contact::with('newsletterubscription')->get();
     *
     * @return {model(s)} 
     */

    public function newsletterSubscription()
    {
        return $this->hasOne('App\Models\NewsletterSubscriber','email','email');
    }

    /**
     * Defines relationship - has one promotion entry
     * Contact::with('promotionEntry')->get();
     *
     * @return {model(s)} 
     */

    public function promotionEntry()
    {
        return $this->hasOne('App\Models\PromotionEntry','email','email');
    }
}