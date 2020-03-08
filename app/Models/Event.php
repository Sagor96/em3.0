<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [ 'contact_id', 'e_name', 'type_id','e_date', ];

    //1 to many
    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    //1 to many
    public function type(){
        return $this->belongsTo(Type::class);
    }

}
