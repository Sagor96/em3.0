<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['s_name', 'amount', 's_status', 'venue_id', ];

    //1 to 1
    public function venue(){
    	return $this->belongsTo(Venue::class);
    }
 

}
