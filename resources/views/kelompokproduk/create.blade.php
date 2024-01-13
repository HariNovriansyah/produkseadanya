<!-- resources/views/kelompokproduk/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Kelompok Produk</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelompokproduk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_kelompok">Nama Kelompok</label>
                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok" value="{{ old('nama_kelompok') }}">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Kelompok Produk</button>
            <a href="{{ route('kelompokproduk.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
