<?php

class Companies extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable=['company_mission','company_vision','company_summary','company_address','company_contact'];
    protected $dates = ['deleted_at'];
}