<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Mass assigned
    protected $fillable = ['name', 'email', 'company_id'];

    // Relation with company
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    // Relation with transfer log
    public function transferLog()
    {
        return $this->hasMany('App\TransferLog');
    }
}
