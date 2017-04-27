<?php

class ReportBusinessIssue extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}