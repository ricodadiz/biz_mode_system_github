<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;
use Laravel\Cashier\BillableTrait;
use Laravel\Cashier\BillableInterface;

class User extends Eloquent implements ConfideUserInterface,BillableInterface
{
	protected $fillable = ['username','user_firstname','user_lastname','user_position','user_bio','user_address','user_age','company_code'];
	protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    use ConfideUser;
    use HasRole; // Add this trait to your user model
    use BillableTrait; // Stripe
}