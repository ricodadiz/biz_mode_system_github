<?php

class JournalTransactions extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}