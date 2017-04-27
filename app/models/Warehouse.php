<?php

class Warehouse extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}