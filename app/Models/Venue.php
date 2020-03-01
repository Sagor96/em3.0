<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
      'v_name',
      'v_addr',
      'status',
  ];
}
