<!-- resources/views/produk/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Produk</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Status Produk</th>
                    <th scope="col">Kelompok Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $produk)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $produk->kode_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->harga_beli }}</td>
                        <td>{{ $produk->harga_jual }}</td>
                        <td>{{ $produk->status_produk }}</td>
                        <td>{{ $produk->kelompokProduk->nama_kelompok }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $produk) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
