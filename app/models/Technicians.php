<?php

class Technicians extends Eloquent {
	use SoftDeletingTrait;
	
    protected $dates = ['deleted_at'];
}