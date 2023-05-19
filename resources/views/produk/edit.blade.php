<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawang Agung Sukses - Edit Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    @include('navbar.navbar')  
    <div class="container py-5 mb-5">
        <form action="{{ url('produk/update/'. $produk->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method("PATCH") 
            @if (session()->has('info'))
                <div class="alert alert-success">
                    {{ session()->get('info') }}
                </div>
@endif
<div class="form-group mt-5">
    <label for="kode">Kode Produk</label>
    <input type="text" name="product_id" id="product_id" placeholder="Masukkan Kode Produk" class="form-control" value="{{ $produk->product_id}}">
    @error('kode')
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nama">Nama Produk</label>
    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Produk" class="form-control" value="{{ $produk->nama}}">
    @error('nama')
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="harga">Harga Produk</label>
    <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Produk" class="form-control" value="{{ $produk->harga}}">
    @error('harga')
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>
<div class="form-group">
<label for="harga">stok Produk</label>
<input type="text" name="stok" id="stok" placeholder="Masukkan Harga Produk" class="form-control" value="{{ $produk->stok}}">
@error('harga')
    <div class="text-danger"> {{ $message }}</div>
@enderror
</div>
<div class="form-group">
    <label for="kategori">Kategori Produk</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->nama }}" {{ $produk->category_id == $category->id ? 'selected' : '' }} href="{{ route('products.by.category', ['category' => $category->id]) }}">{{ $category->nama }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="stok">Deskripsi Produk</label>
    <input type="text" name="product_detail" id="product_detail" placeholder="Masukkan Stok Produk" class="form-control" value="{{ $produk->product_detail}}">
    @error('harga')
        <div class="text-danger"> {{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Foto Lama</label>
        <div>
            @if ($produk && $produk->foto)
                <img src="{{ asset('storage/'.$produk->foto) }}" alt="" width="100">
            @else
                <p>Tidak ada foto</p>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
        @error('foto')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
@include('footer.footer')
</form>
</body>