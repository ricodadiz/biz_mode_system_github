<?php

class AccountBalances extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}