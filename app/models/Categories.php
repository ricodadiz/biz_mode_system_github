<?php

class Categories extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}