<?php

class Payments extends Eloquent {
	use SoftDeletingTrait;
	protected $table = "payments";
    protected $dates = ['deleted_at'];
}