<?php

namespace App\Http\Controllers;

use App\Costumers;
use App\Exports\CostumersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CostumersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers=DB::table('costumers')
            ->get();

        return view('backend.costumers',compact('costumers'));
    }

    /**
     * @param $type
     * @return mixed
     */
    public function downloadExcel()
    {
        return Excel::download(new CostumersExport(), 'royal_hotel_clients.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function show(Costumers $costumers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumers $costumers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumers $costumers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costumers  $costumers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumers $costumers)
    {
        //
    }
}
