<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;

    public function taxiDriver()
    {
        return $this->hasOne(TaxiDriver::class, 'id', 'id');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'id');
    }

    public function newOrder()
    {
        return $this->hasMany(TaxiDriver::class, 'id', 'taxiDriverId');
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class, 'userLevelId', 'id');
    }

    public function getPrivileges()
    {
        $userLevelId = $this->userLevel->id;
        $privileges = Privilege::whereIn('id', UserLevelPrivilege::where('user_level_id', $userLevelId)->get(['privilege_id']))->get(['id'])->toArray();
        return array_flatten($privileges);
    }

    

}
