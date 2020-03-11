<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [ 'created_at','event_id', 'venue_id', 'staffdetail_id', ];

    //1 to 1
    public function event(){
        return $this->belongsTo(Event::class);
    }

    //1 to 1
    public function venue(){
        return $this->belongsTo(Venue::class);
    }

    //1 to many
    public function staffdetail(){
        return $this->belongsTo(Staffdetail::class);
    }

}
