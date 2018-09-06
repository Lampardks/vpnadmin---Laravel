<?php

namespace App\Http\Controllers\Admin;

use App\TransferLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;

class TransferLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Artisan::call('migrate:refresh', ['--seed' => 1]);

        return redirect()->route('admin.abusers.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransferLog  $transferLog
     * @return \Illuminate\Http\Response
     */
    public function show(TransferLog $transferLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransferLog  $transferLog
     * @return \Illuminate\Http\Response
     */
    public function edit(TransferLog $transferLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransferLog  $transferLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransferLog $transferLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransferLog  $transferLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferLog $transferLog)
    {
        //
    }
}
