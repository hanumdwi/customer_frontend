<?php

namespace App\Http\Controllers;

use App\Poliklinik;
use Illuminate\Http\Request;
use DB;

class PoliklinikController extends Controller
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
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $poliklinik=DB::table('poliklinik')->select('NAMA_POLI','DESKRIPSI_POLI')->get();
        
        return response()->json($poliklinik,200);
    }

    public function show_all()
    {
        // $poliklinik=DB::table('poliklinik')->select('NAMA_POLO','DESKRIPSI_POLI')->get();
        
        return response()->json(Poliklinik::all(),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliklinik $poliklinik)
    {
        //
    }
}
