<?php

class Retailer extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}