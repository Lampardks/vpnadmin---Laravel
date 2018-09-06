<?php

namespace App\Http\Controllers\Admin;

use App\TransferLog;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbusersController extends Controller
{
    // Abusers
    public function index(Request $request)
    {
        if ($request->month) {
            $month = \Carbon\Carbon::parse($request->month.' 1, 2018')->month;
        } else {
            return view('admin.abusers.index', [
                'companies' => [],
                'sum' => [],
                'months' => TransferLog::months()
            ]);
        }
        
        $abusers = Company::with(['transfers' => function ($query) use($month) {
            $query->whereMonth('date_time', $month);
        }])->get();
        $abusers = collect($abusers);

        $sum = [];
        $abusers->each(function ($company) use(&$abuser, &$sum) {
            $sumBytes = $company->transfers->sum('transferredByte');
            $sumKb = $company->transfers->sum('transferredKb')+$sumBytes/1024;
            $sumMb = $company->transfers->sum('transferredMb')+$sumKb/1024;
            $sumGb = $company->transfers->sum('transferredGb')+$sumMb/1024;
            $sumTb = $company->transfers->sum('transferredTb')+$sumGb/1024;
            $sum[] = ['id' => $company->id, 'sum' => round($sumTb, 2)];
        });

        $sum = collect($sum)->sortByDesc('sum')->values()->all();

        return view('admin.abusers.index', [
            'companies' => $abusers,
            'sum' => $sum,
            'months' => TransferLog::months()
        ]);
    }
}
