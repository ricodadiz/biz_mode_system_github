<?php

class Service extends Eloquent {
	use SoftDeletingTrait;
	
    protected $dates = ['deleted_at'];

    				
}