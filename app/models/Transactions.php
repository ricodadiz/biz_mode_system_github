<?php

class Transactions extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}