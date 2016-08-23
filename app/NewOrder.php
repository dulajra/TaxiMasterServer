<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    public $timestamps = false;

    public function taxiDriver(){
       return $this->belongsTo(User::class, 'taxiDriverId', 'id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customerId', 'id');
    }
}
