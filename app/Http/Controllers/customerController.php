<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class customerController extends Controller
{
    public function index()
    {
        $this->authorize('view_customer', customer::class);

        $customer = customer::all();
        return view("customer.index", compact('customer'));
    }

    public function create()
    {
        $this->authorize('create_customer', customer::class);

        return view("customer.create");
    }

    public function store(Request $request)
    {
        $this->authorize('create_customer', customer::class);

        $customer = new customer();
        $customer->nama = $request->nama;
        $customer->id = $request->kode;
        $customer->nomorTelepon = $request->noTelp;
        $customer->alamatLengkap = $request->alamat;
        $customer->save();

        $request->session()->flash("info", "Data customer $request->nama berhasil disimpan!");
        return redirect()->route("customer.create");
    }

    public function show(Request $request, $id)
    {
        $customer = customer::find($id);
        return view("customer.view", compact("customer"));
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('update_customer', customer::class);

        $customer = customer::find($id);
        return view("customer.edit", compact("customer"));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update_customer', customer::class);

        $customer = customer::find($id);
        $customer->nama = $request->nama;
        $customer->idCustomer = $request->kode;
        $customer->noTelepon = $request->noTelp;
        $customer->alamatLengkap = $request->alamat;
        $customer->save();
    
        $request->session()->flash("info", "Data customer $request->nama berhasil diganti!");
        return redirect()->route("customer.edit", [$id]);
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('delete_customer', customer::class);
        
        $customer = customer::find($id);
        if($customer->id){
            $customer->delete();
        }
        
        $request->session()->flash("info", "Data customer $request->nama berhasil dihapus!");
        return redirect()->route("customer.index");
    }
}