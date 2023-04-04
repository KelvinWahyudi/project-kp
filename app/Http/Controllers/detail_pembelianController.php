<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\detailpembelian;
use App\Models\coffee;
use App\Models\customer;
use App\Models\transaksi;

class detail_pembelianController extends Controller
{
    //
    public function index($id)
    {
        $transaksi = transaksi::find($id);   
        return view("detailpembelian.index", compact('transaksi'));
    }

    public function create()
    {
        return view("detailpembelian.create");
    }

    public function store(Request $request, $id)
    {
        // $customer = new customer();
        // $customer->nama = $request->nama;
        // $customer->noTelepon = $request->noTelp;
        // $customer->alamat = $request->alamat;
        // $customer->save();

        $customer = customer::create([
            "nama" => $request->nama,
            "noTelepon" => $request->noTelp,
            "alamat" => $request->alamat 
        ]);

        $transaksi = DB::table('customer')->latest('created_at')->first();
        // $transaksi2 = DB::table('transaksi')->latest('created_at')->first();
        $transaksi3 = transaksi::find($id);
        $transaksi3->idCustomer = $transaksi->id;
        $transaksi3->save();

        $request->session()->flash("info", "Pembayaran telah berhasil dibayar!");
        return redirect()->route("home");
    }

    public function show(Request $request, $id)
    {
        $detailpembelian = detailpembelian::find($id);
        return view("detailpembelian.view", compact("detailpembelian"));
    }

    public function edit(Request $request, $id)
    {
        $detailpembelian = detailpembelian::find($id);
        return view("detailpembelian.edit", compact("detailpembelian"));
    }

    public function update(Request $request, $id)
    {
        $customer = detailpembelian::find($id);
        $customer->nama = $request->nama;
        $customer->noTelepon = $request->noTelp;
        $customer->alamat = $request->alamat;
        $customer->save();
    
        $request->session()->flash("info", "Data pembelian $request->nama berhasil diganti!");
        return redirect()->route("detailpembelian.edit", [$id]);
    }

    public function destroy(Request $request, $id)
    {
        $detailpembelian = detailpembelian::find($id);
        if($detailpembelian->id){
            $detailpembelian->delete();
        }
        
        $request->session()->flash("info", "Data pembelian $request->nama berhasil dihapus!");
        return redirect()->route("detailpembelian.index");
    }

}

