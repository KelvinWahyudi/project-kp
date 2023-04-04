<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\customer;
use App\Models\detail_pembelian;

class produkController extends Controller
{
    public function index(){
        $this->authorize('view_produk', produk::class);

        $produk = produk::all();
        return view("produk.index", compact('produk'));
    }

    public function variant(){
        $produk = produk::all();
        return view("variant", compact('produk'));
    }

    public function create(){
        $this->authorize('create_produk', produk::class);

        return view("produk.create");
    }

    public function store(Request $request){
        $this->authorize('create_produk', produk::class);

        $validation = $request->validate([
            'nama' => 'required|min:5|max:50',
            'foto' => 'required|file|image|max:10000'
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = "foto-".time().".".$ext;
        $path = $request->foto->storeAs("public", $nama_file);

        $produk = new produk();
        $produk->nama = $request->nama;
        $produk->idProduk = $request->kode;
        $produk->detailProduk = $request->deskripsi;
        $produk->foto = $nama_file;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();

        $request->session()->flash("info", "Data produk $request->nama berhasil disimpan!");
        return redirect()->route("produk.create");
    }

    public function show(Request $request, $id){
        $produk = produk::find($id);
        return view("produk.view", compact("produk"));
    }

    public function edit(Request $request, $id){
        $this->authorize('update_produk', produk::class);

        $produk = produk::find($id);
        return view("produk.edit", compact('produk'));
    }

    public function update(Request $request, $id){
        $this->authorize('update_produk', produk::class);

        if ($request->hasFile('foto')) { 
            $validation = $request->validate([
                'nama' => 'required|min:5|max:20',
                'foto' => 'required|file|image|max:5000'
            ]);
        } else{
            $validation = $request->validate([
            'nama' => 'required|min:5|max:20'
            ]);
        }
       
        $produk = produk::find($id);
        $produk->nama = $request->nama;
        $produk->idProduk = $request->kode;
        $produk->detailProduk= $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        
        if($request->foto){
            $ext = $request->foto->getClientOriginalExtension();  
            $nama_file = "foto-".time().".".$ext;
            $path = $request->foto->storeAs("public", $nama_file);
            $produk->foto = ($request->hasFile("foto")) ? $nama_file : $produk->foto;
        }
        
        $produk->save();
        $request->session()->flash("info", "Data produk $request->nama berhasil diganti!");
        return redirect()->route("produk.edit", [$id]);
    }

    public function destroy(Request $request, $idProduk){
        $this->authorize('delete_produk', produk::class);

        $produk = produk::find($idProduk);
        if($produk->idProduk){
            $produk->delete();
        }

        $request->session()->flash("info", "Data produk $request->nama berhasil dihapus!");
        return redirect()->route("produk.index");
    }

    public function cart()
    {
        $transaksi = null;
        $themp = transaksi::latest("id")->first();
        
        if($themp != null) {
            $transaksi = $themp;
        } else {
            $transaksi = transaksi::firstOrCreate(
                ["id" => 1],
                ["tanggal" => date("Y-m-d")]
            );
        }
        return view('transaksi.index', compact("transaksi"));
    }
 
    public function addToCart($id)
    {
        $produk = produk::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $produk->nama,
                "quantity" => 1,
                "price" => $produk->harga,
                "image" => $produk->foto
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('info', 'Produk telah berhasil ditambah!');
    }
  
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Produk telah berhasil diganti!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk telah berhasil dihapus!');
        }
    }

    public function tes(Request $request)
    {
        $themp = transaksi::latest('id')->first();
        $id2 = $themp->id;
        $themp->tanggal = date('Y-m-d');
        $themp->save();

        $transaksi = new transaksi();
        $transaksi->id = $themp->id + 1;
        $transaksi->save();

        $total = 0;
        foreach(session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
            $detailpembelian = new detail_pembelian();
            $produk = produk::where('nama', $details['name'])->first();
            $produk->decrement('stok', $details['quantity']);
            $kodeProduk = $produk->idProduk;
            $detail_pembelian->idProduk = $kodeProduk;
            $detail_pembelian->kdTransaksi = $id2;
            $detail_pembelian->jumlahPembelian = $details['quantity'];
            $detail_pembelian->save();
        }

        $request->session()->forget('cart');

        return redirect()->route('detail_pembelian.index', [$id2]);
    }
}
