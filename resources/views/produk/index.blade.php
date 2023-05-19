<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lawang Agung Sukses - Tambah Produk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://unpkg.com/feather-icons"></script>
</head>
    
    @include('navbar.navbar')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>    
<h4>Daftar Produk</h4>
@if (session()->has('info'))
<div class="alert alert-success">
    {{ session()->get('info') }}
</div>
@endif

<div class="mt-5 d-md-flex justify-content-between">
        @if (Session::get('info'))
        <div class="alert alert-success">
            {{ Session::get('info') }}
        </div>
        @endif            
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produk as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->product_id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->product_detail }}</td>
            <td>
                <img src="{{asset('storage/'. $item->foto)}}" alt="" width="100">
            </td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->category->nama }}</td>
        </td>
        <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
            <td class="text-align-center">
                @can('delete_produk', \App\Models\produk::class)
                <form action="{{ url('/produk/delete/'.$item->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
                @endcan
                @can('update_produk', \App\Models\produk::class)
                <a href="{{ url('/produk/edit/'.$item->id) }}" class="btn">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                @endcan
            </td>
        </div>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="https://unpkg.com/feather-icons"></script>
<style>
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #161F72;
      color: white;
      text-align: center;
    }
    </style>
  <footer class="footer">
      <div class="links">
        <a href="#home">Home</a>
        <a href="#menu">Produk</a>
        <a href="#about">Tentang Kami</a>
      </div>
  
      <div class="credit">
        <p>Created by <span>CV LAWANG AGUNG SUKSES</span> | &copy; 2023</p>
      </div>
    </footer>
{{-- @endsection --}}