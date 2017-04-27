<?php

class Products extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}