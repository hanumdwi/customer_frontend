<?php

namespace App\Http\Controllers;

use App\Dokter;
use Illuminate\Http\Request;
use DB;

class DokterController extends Controller
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
     * @param  \App\dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $dokter=DB::table('dokter')->select('NAMA','STATUS_DOKTER')->get();
        
        return response()->json($dokter,200);
    }

    public function show_all()
    {
        
        // $dokter=DB::table('dokter')->select('NAMA','STATUS_DOKTER')->get();

        return response()->json(Dokter::all(),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokter $dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokter $dokter)
    {
        //
    }
}
