<?php

namespace App\Http\Controllers;

use App\sewa_bus;
use App\pengguna;
use App\customer;
use App\category;
use App\paket_wisata;
use App\sewa_bus_category;
use App\sewa_paket_wisata;
use App\Pricelist_Sewa_Armada;
use App\schedule_armada;
use App\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $sewa_bus= Sewa_Bus::find($id);
        $customer= customer::find($sewa_bus->ID_CUSTOMER);

        $category_armada=DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')->get();
        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();


        return view('cart', ['sewa_bus' =>$sewa_bus,'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    public function indexcart(Request $request)
    {
        $sewa_bus= DB::table('sewa_bus')->get();

        $category_armada=DB::table('category_armada')->get();
        $pricelist_sewa_armada=DB::table('pricelist_sewa_armada')->get();
        $sewa_bus_category=DB::table('sewa_bus_category')
        ->join('sewa_bus','sewa_bus_category.ID_SEWA_BUS', '=', 'sewa_bus.ID_SEWA_BUS')
        ->join('pricelist_sewa_armada','sewa_bus_category.ID_PRICELIST', '=', 'pricelist_sewa_armada.ID_PRICELIST')
        ->join('category_armada', 'pricelist_sewa_armada.ID_CATEGORY', '=', 'category_armada.ID_CATEGORY')
        ->select('sewa_bus_category.ID_SEWA_BUS', 'sewa_bus_category.ID_PRICELIST',
        'sewa_bus_category.QUANTITY', 'sewa_bus_category.TOTAL',
        'category_armada.NAMA_CATEGORY', 'pricelist_sewa_armada.TUJUAN_SEWA', 'pricelist_sewa_armada.PRICELIST_SEWA')
        ->get();


        return view('cart', ['sewa_bus' =>$sewa_bus],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexawal()
    {
        $customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        'sewa_bus.TGL_AKHIR_SEWA','sewa_bus.LAMA_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        'sewa_bus.HARGA_SEWA_BUS','sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA', 'sewa_bus.STATUS_SEWA')
        ->get();

        $max = DB::table('sewa_bus')->max('ID_SEWA_BUS');
        date_default_timezone_set('Asia/Jakarta');
        $date=date("ymd",time());

        $max=substr($max,6);
        if($max>=1){
            $ID_SEWA_BUS=$date.str_pad($max+1,4,"0",STR_PAD_LEFT);
        }
        else{
            $ID_SEWA_BUS=$date.str_pad(1,4,"0",STR_PAD_LEFT);
        }
        
        return view('cartawal', ['sewa_bus' =>$sewa_bus,'ID_SEWA_BUS'=>$ID_SEWA_BUS,'customer'=>$customer,'pengguna'=>$pengguna]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            DB::table('sewa_bus')->insert([
                'ID_SEWA_BUS' => $request->ID_SEWA_BUS,
                'TGL_SEWA_BUS' => $request->TGL_SEWA,
                'TGL_AKHIR_SEWA' => $request->TGL_AKHIR_SEWA,
                'LAMA_SEWA' => $request->LAMA_SEWA,
                'ID_CUSTOMER' => $request->ID_CUSTOMER,
                'ID_PENGGUNA' => $request->ID_PENGGUNA,
                'HARGA_SEWA_BUS' => $request->HARGA_SEWA_BUS,
                'JAM_SEWA' => $request->JAM_SEWA,
                'JAM_AKHIR_SEWA' => $request->JAM_AKHIR_SEWA,
                'DP_BUS'        =>  $request->DP_SEWA,
                'STATUS_SEWA' => $request->statussewa
            ]);

        DB::commit();
        }
        Catch (\Exception $ex){
            DB::rollback();
            throw $ex;
        }
             return redirect('datacart')->with('insert','data berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
