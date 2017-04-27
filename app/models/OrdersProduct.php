<?php

class OrdersProduct extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable = ['order_id','product_id','unit','qty'];
    protected $dates = ['deleted_at'];
}