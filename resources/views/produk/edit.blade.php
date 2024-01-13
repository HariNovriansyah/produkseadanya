<!-- resources/views/produk/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.update', $produk) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_produk">Kode Produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ $produk->kode_produk }}">
            </div>

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}">
            </div>

            <div class="form-group">
                <label for="harga_beli">Harga Beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}">
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $produk->harga_jual }}">
            </div>

            <div class="form-group">
                <label for="status_produk">Status Produk</label>
                <select class="form-control" id="status_produk" name="status_produk">
                    <option value="tunai" {{ $produk->status_produk == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="kredit" {{ $produk->status_produk == 'kredit' ? 'selected' : '' }}>Kredit</option>
                    <option value="konsinyasi" {{ $produk->status_produk == 'konsinyasi' ? 'selected' : '' }}>Konsinyasi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kelompok_produk_id">Kelompok Produk</label>
                <select class="form-control" id="kelompok_produk_id" name="kelompok_produk_id">
                    @foreach ($kelompokProduks as $kelompokProduk)
                        <option value="{{ $kelompokProduk->id }}" {{ $produk->kelompok_produk_id == $kelompokProduk->id ? 'selected' : '' }}>
                            {{ $kelompokProduk->nama_kelompok }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('produk.show', $produk) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
