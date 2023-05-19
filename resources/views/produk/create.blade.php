<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawang Agung Sukses - Tambah Produk</title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> 
<form action="{{ url('produk/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mt-5">
        <label for="kode">Kode Produk</label>
        <input type="text" name="product_id" id="product_id" placeholder="Masukkan Kode Produk" class="form-control" value="{{ old('product_id')}}">
        @error('product_id')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Produk" class="form-control" value="{{ old('nama')}}">
        @error('nama')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="harga">Harga Produk</label>
        <input type="text" name="harga" id="harga" placeholder="Masukkan Harga Produk" class="form-control" value="{{ old('harga')}}">
        @error('harga')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
<div class="form-group">
    <label for="harga">Stok Produk</label>
    <input type="text" name="stok" id="stok" placeholder="Masukkan Stok Produk" class="form-control" value="{{ old('stok')}}">
    @error('stok')
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="kategori">Kategori Produk</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }} href="{{ route('products.by.category', ['category' => $category->id]) }}">{{ $category->nama }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
    <div class="form-group">
        <label for="stok">Deskripsi Produk</label>
        <input type="text" name="product_detail" id="product_detail" placeholder="Masukkan Deskripsi Produk" class="form-control" value="{{ old('product_detail')}}">
        @error('product_detail')
            <div class="text-danger"> {{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="foto">Foto/Logo</label>
        <input type="file" name="foto" id="foto" class="form-control">
        @error('foto')
            <div class="text-danger"> {{ $message }}</div>
        @enderror    
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
    @include('footer.footer')
</form>
</body>

