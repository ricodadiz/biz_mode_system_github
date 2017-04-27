<?php

class Brands extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}