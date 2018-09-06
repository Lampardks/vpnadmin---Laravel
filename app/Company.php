<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // Mass assigned
    protected $fillable = ['name', 'quota'];

    // Relation with employees
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    // Get all transfers
    public function transfers()
    {
        return $this->hasManyThrough('App\TransferLog', 'App\Employee');
    }
}
