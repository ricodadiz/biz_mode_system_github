<?php

class Bills extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}