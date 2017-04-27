<?php

class CompanyMember extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}