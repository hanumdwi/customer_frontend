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

class SewaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        if(!Session::get('login')){
            return redirect('login');
        }
        else{
        $sewa_bus= Sewa_Bus::find($id);
        $pengguna= Pengguna::find($sewa_bus->ID_PENGGUNA);
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


        return view('sewa_bus_detail', ['sewa_bus' =>$sewa_bus,'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }
}

    public function indexawal()
    {
        $sewa_bus= Sewa_Bus::all();
        $customer= customer::all();

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


        return view('pemesanan', ['sewa_bus' =>$sewa_bus,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }


    public function indexpaket(Request $request, $id)
    {
        if(!Session::get('login')){
            return redirect('login');
        }
        else{
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
        $pengguna= Pengguna::find($sewa_paket_wisata->ID_PENGGUNA);
        $customer= Customer::find($sewa_paket_wisata->ID_CUSTOMER);
        
        $paket_wisata= Paket_Wisata::find($sewa_paket_wisata->ID_PAKET);



        return view('sewa_paket_detail', ['sewa_paket_wisata' =>$sewa_paket_wisata,'pengguna'=>$pengguna,
        'customer'=>$customer,'paket_wisata'=>$paket_wisata]);
    }
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

    public function pdf(Request $request, $id)
    {
        $sewa_bus= Sewa_Bus::find($id);
        $pengguna= Pengguna::find($sewa_bus->ID_PENGGUNA);
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


        return view('invoice',['sewa_bus'=>$sewa_bus, 'pengguna'=>$pengguna,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category, 'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    public function pdf_paket(Request $request, $id)
    {
        $sewa_paket_wisata= Sewa_Paket_Wisata::find($id);
        $pengguna= Pengguna::find($sewa_paket_wisata->ID_PENGGUNA);
        $customer= customer::find($sewa_paket_wisata->ID_CUSTOMER);

        $paket_wisata=DB::table('paket_wisata')->get();
        $sewa_paket_wisata=DB::table('sewa_paket_wisata')
        ->join('paket_wisata','sewa_paket_wisata.ID_PAKET', '=', 'paket_wisata.ID_PAKET')
        ->where('ID_SEWA_PAKET', '=', $id)
        ->select('sewa_paket_wisata.ID_SEWA_PAKET','sewa_paket_wisata.TGL_SEWA_PAKET',
        'sewa_paket_wisata.TGL_AKHIR_SEWA_PAKET', 'sewa_paket_wisata.DP_PAKET',
        'sewa_paket_wisata.HARGA_SEWA_PAKET','sewa_paket_wisata.JAM_SEWA_PAKET',
        'sewa_paket_wisata.JAM_AKHIR_SEWA_PAKET','paket_wisata.NAMA_PAKET')
        ->get();

        return view('invoicepaket',['sewa_paket_wisata'=>$sewa_paket_wisata, 'pengguna'=>$pengguna,
        'customer'=>$customer, 'paket_wisata'=>$paket_wisata]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pricelist_sewa_armada')->insert([
            'ID_CATEGORY'  =>  $request->ID_CATEGORY,
            'TUJUAN_SEWA'  =>  $request->TUJUAN_SEWA,
        ]);

        DB::table('sewa_bus')->insert([
            'ID_SEWA_BUS' => $request->ID_SEWA_BUS,
            'TGL_SEWA_BUS' => $request->TGL_SEWA_BUS,
            'TGL_AKHIR_SEWA' => $request->TGL_AKHIR_SEWA,
            'ID_CUSTOMER' => $request->ID_CUSTOMER,
            'ID_PENGGUNA' => $request->ID_PENGGUNA
            ]);
        
    //    dd($request);

        // foreach($request['ID_PRICELIST'] as $pricelist_sewa_armada){
        //     DB::table('sewa_bus_category')->insert([
        //         'ID_SEWA_BUS' => $request->ID_SEWA_BUS,
        //         'ID_PRICELIST' => $pricelist_sewa_armada,
        //         'PRICELIST_SEWA' => $request['PRICELIST_SEWA'][$pricelist_sewa_armada],
        //         'QUANTITY' => $request['QUANTITY'][$pricelist_sewa_armada],
        //         'TOTAL' => $request['TOTAL'][$pricelist_sewa_armada],
        //         'DP' => $request['DP'][$pricelist_sewa_armada],
        //         'SISA_BAYAR' => $request['SISA_BAYAR'][$pricelist_sewa_armada]
        //         ]);
        //     }

        return redirect('pemesanan_berhasil')->with('insert','data berhasil di tambah');
    }

    public function berhasil(Request $request, $id)
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


        return view('pemesanan_berhasil', ['sewa_bus' =>$sewa_bus,'customer'=>$customer],
        ['sewa_bus_category'=>$sewa_bus_category,'pricelist_sewa_armada'=>$pricelist_sewa_armada, 'category_armada'=>$category_armada]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     DB::table('category_armada')->where('ID_CATEGORY',$request->id)->update([
    //         'NAMA_CATEGORY'   => $request->namacategory
    //     ]);

    //     return redirect('category_armadaindex');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('category_armada')->where('ID_CATEGORY',$id)->delete();
		
		// alihkan halaman ke halaman category
		return redirect('category_armadaindex');
    }

    public function cetak_pdf($id)
    {
    	$customer=DB::table('customer')->get();
        $pengguna=DB::table('pengguna')->get();
        $sewa_bus=DB::table('sewa_bus')
        ->join('customer','sewa_bus.ID_CUSTOMER', '=', 'customer.ID_CUSTOMER')
        ->join('pengguna','sewa_bus.ID_PENGGUNA', '=', 'pengguna.ID_PENGGUNA')
        ->select('sewa_bus.ID_SEWA_BUS','sewa_bus.TGL_SEWA_BUS',
        'sewa_bus.TGL_AKHIR_SEWA','sewa_bus.LAMA_SEWA','customer.NAMA_CUSTOMER', 'sewa_bus.DP_BUS',
        'sewa_bus.HARGA_SEWA_BUS','sewa_bus.JAM_SEWA','sewa_bus.JAM_AKHIR_SEWA','pengguna.NAMA_PENGGUNA')
        ->get();

    	// $pdf = PDF::loadview('invoice',['sewa_bus'=>$sewa_bus]);
        // return $pdf->stream();
        // $pegawai = Pegawai::all();
 
    	$pdf = PDF::loadview('pegawai_pdf',['sewa_bus' =>$sewa_bus,'ID_SEWA_BUS'=>$ID_SEWA_BUS,'customer'=>$customer,'pengguna'=>$pengguna]);
    	return $pdf->download('laporan-sewa_bus-pdf');
    }

    public function update(Request $request, $id)
    {
        DB::table('sewa_bus')->where('ID_SEWA_BUS',$request->ID_SEWA_BUS)->update([
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

        return redirect('sewa_bus');
    }
}
