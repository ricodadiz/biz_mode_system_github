<?php

class ServicesClients extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable = ['service_id','item','unit_cost','qty'];
    protected $dates = ['deleted_at'];
}