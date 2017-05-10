<?php

class ClientsServices extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable = ['service_id','item','unit_cost','qty','total'];
    protected $dates = ['deleted_at'];
}