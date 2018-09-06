<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferLog extends Model
{
    // Mass assigned
    protected $fillable = [
        'date_time', 
        'resource', 
        'transferredByte',
        'transferredKb',
        'transferredMb',
        'transferredGb',
        'transferredTb'
    ];
    
    // Relation with employee
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    // Months
    public static function months()
    {
        $months = [];
        for ($i=0; $i < 6; $i++) {      
            $month = new \Carbon\Carbon('first day of last month');
            if ($i != 0) $month->subMonths($i);
            $months[$i] = $month->format('F');
        }
        return $months;
    }
}
