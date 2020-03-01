<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    use Notifiable;
    protected $table='clients';
    protected $fillable=['name','email','password'];
    protected $hidden=['password','remember_token'];

}
