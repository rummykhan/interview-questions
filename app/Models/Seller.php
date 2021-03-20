<?php


namespace App\Models;


use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model implements CanResetPassword
{
    use \Illuminate\Auth\Passwords\CanResetPassword;
}
