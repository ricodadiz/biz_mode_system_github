<?php

class Messages extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}