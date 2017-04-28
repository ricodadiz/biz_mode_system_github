<?php

class ExpensesServices extends Eloquent {
	use SoftDeletingTrait;
	
    protected $dates = ['deleted_at'];
}