<?php

class Clients extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable=['client_name','status'];
    protected $dates = ['deleted_at'];
}