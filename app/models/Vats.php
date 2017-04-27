<?php

class Vats extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}