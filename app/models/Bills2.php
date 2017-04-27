<?php

class Bills2 extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}