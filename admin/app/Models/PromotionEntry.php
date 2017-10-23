<?php

namespace App\Models;

class PromotionEntry extends BaseModel
{
  	protected $table = 'promotion_entries';
    public $pageTemplate = 'adminarea/promotionentries.twig';
    public $tableTemplate = 'adminarea/partials/promotionentries_table.twig';
    public $tableRowTemplate = 'adminarea/partials/promotionentries_row.twig';

  	/**
	 * Mutator - converts type_indetification to uppercase
	 *
	 * @return {string} type_identification in upper case.
	 */

  	public function getTypeIdentificationAttribute($value)
    {
        return strtoupper($value);
    }

    /**
	 * Defines relationship - belongs to one contact
	 * PromotionEntry::with('contact')->get();
	 *
	 * @return {model} $contact
	 */

  	public function contact()
    {
        return $this->belongsTo('App\Models\Contact','email','email');
    }
}