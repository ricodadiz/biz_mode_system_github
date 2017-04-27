<?php

class Accounts extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}