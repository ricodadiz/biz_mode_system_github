<?php

class Calendar extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}