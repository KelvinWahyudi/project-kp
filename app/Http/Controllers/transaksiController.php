<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\customer;

class transaksiController extends Controller
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
     * @param  \Illuminate\Http\Request  $request.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $nama = $request->nama;
        $alamat = $request->alamatLengkap;
        $jumlah = $request->jumlah_pembelian;

        $produk = produk::find($id);
        $produk->decrement('stok', $request->input('jumlahPembelian'));
        $total = $produk->harga * $jumlah;
        
        $customer = new customer();
        $customer->nama = $nama;
        $customer->alamat = $alamat;
        $customer->save();
        return view("transaksi.index", compact('produk','nama','alamat','total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
