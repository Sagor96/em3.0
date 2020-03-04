<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffDetail extends Model
{
    protected $fillable = [
        'staff_name','designation', 'phone', 'address',  
    ]; 

}
