<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedOrder extends Model
{
    public $timestamps = false;

    public function taxi(){
        return $this->belongsTo(Taxi::class, 'taxiId', 'id');
    }

    public function taxiDriver(){
        return $this->belongsTo(User::class, 'taxiDriverId', 'id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customerId', 'id');
    }
}
