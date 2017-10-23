<?php

namespace App\Models;

class CompanyContact extends BaseModel
{
  	protected $table = 'company_contacts';
    public $pageTemplate = 'adminarea/companycontacts.twig';
    public $tableTemplate = 'adminarea/partials/companycontacts_table.twig';
    public $tableRowTemplate = 'adminarea/partials/companycontacts_row.twig';

  	/**
	 * Defines relationship - belongs to one contact
	 * CompanyContact::with('contact')->get();
	 *
	 * @return {model} $contact
	 */

  	public function contact()
    {
        return $this->belongsTo('App\Models\Contact','email','email');
    }
}