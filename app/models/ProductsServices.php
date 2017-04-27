<?php

class ProductsServices extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}