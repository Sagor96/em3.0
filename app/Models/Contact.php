<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
        'contact_name','email', 'phone', 'address', 'client_id', 
    ]; 

    


}
