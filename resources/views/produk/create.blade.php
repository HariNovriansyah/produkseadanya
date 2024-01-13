<!-- resources/views/produk/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

           <div class="form-group row">
    <label for="kode_produk" class="col-md-2 col-form-label">Kode Produk</label>
    <div class="col-md-6">
        <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ isset($produk) ? $produk->kode_produk : old('kode_produk') }}">
    </div>
    <div class="col-md-2">
        <button type="submit" name="action" value="search" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
    </div>
    @error('kode_produk')
        <div class="col-md-12 mt-2">
            <span class="text-danger">{{ $message }}</span>
        </div>
    @enderror
</div>


 @if (isset($produk))
    <div class="alert alert-success mt-3">
        Produk ditemukan:
        {{ $produk->nama_produk }}, Harga: {{ $produk->harga_jual }}, Status: {{ $produk->status_produk }}, Kelompok Produk: {{ $produk->kelompokProduk->nama_kelompok }}, Stok :{{ $produk->stok }}
    </div>
@endif

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}">
            </div>

            <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}">
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}">
            </div>

            <div class="form-group">
                <label for="status_produk">Status Produk</label>
                <select class="form-control" id="status_produk" name="status_produk">
                    <option value="tunai" {{ old('status_produk') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="kredit" {{ old('status_produk') == 'kredit' ? 'selected' : '' }}>Kredit</option>
                    <option value="konsinyasi" {{ old('status_produk') == 'konsinyasi' ? 'selected' : '' }}>Konsinyasi</option>
                </select>
            </div>

         @if(isset($kelompokProduks) && count($kelompokProduks) > 0)
    <div class="form-group">
        <label for="kelompok_produk_id">Kelompok Produk</label>
        <select class="form-control" id="kelompok_produk_id" name="kelompok_produk_id">
            @foreach ($kelompokProduks as $kelompokProduk)
                <option value="{{ $kelompokProduk->id }}" {{ old('kelompok_produk_id') == $kelompokProduk->id ? 'selected' : '' }}>
                    {{ $kelompokProduk->nama_kelompok }}
                </option>
            @endforeach
        </select>
    </div>
@endif




            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" >
            </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>
@endsection
