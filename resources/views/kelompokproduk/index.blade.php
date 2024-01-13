<!-- resources/views/kelompokproduk/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kelompok Produk</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('kelompokproduk.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i></a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kelompok</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kelompokProduk as $kelompok)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $kelompok->nama_kelompok }}</td>
                        <td>{{ $kelompok->deskripsi }}</td>
                        <td>
                            <a href="{{ route('kelompokproduk.edit', $kelompok) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('kelompokproduk.destroy', $kelompok) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data kelompok produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
