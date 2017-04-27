<?php

class Delivery extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable=['delivered_to','delivered_address','product_name','quantity','unit','description','delivery_date'];
	protected $dates = ['deleted_at'];
}