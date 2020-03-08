<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 's_name', 'amount', 's_status', 'status', 'service_id', 'date_of_birth', 'address',  'designation',  'reference', 
    ]; 

}
