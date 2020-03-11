<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'created_at','contact_id', 'payment_id', 'order_total', ];

    //1 to many
    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    //1 to many
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
