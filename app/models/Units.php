<?php

class Units extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}