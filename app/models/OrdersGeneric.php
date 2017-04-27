<?php

class OrdersGeneric extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}