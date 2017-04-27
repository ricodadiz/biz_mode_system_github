<?php

class JournalAccounts extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}