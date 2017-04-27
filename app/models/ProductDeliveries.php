<?php

class ProductDeliveries extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable = ["unit"];	
	protected $dates = ['deleted_at'];
}