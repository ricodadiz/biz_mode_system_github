<?php

class ReportTechnicalIssue extends Eloquent {
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}