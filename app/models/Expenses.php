<?php

class Expenses extends Eloquent {
	use SoftDeletingTrait;
	
    protected $dates = ['deleted_at'];
}