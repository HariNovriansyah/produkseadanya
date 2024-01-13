<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KelompokProduk;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $kelompokProduks = KelompokProduk::all();


        Log::info('Isi $kelompokProduks: ' . print_r($kelompokProduks, true));

        return view('produk.create', compact('kelompokProduks'));
    }

    public function store(Request $request)
    {
        $kelompokProduks = KelompokProduk::all();

        // Cek apakah ada data pencarian
        $kodeProduk = $request->input('kode_produk');
        $produk = Produk::where('kode_produk', $kodeProduk)->first();

        return view('produk.create', compact('kelompokProduks', 'produk'));
        $action = $request->input('action');

        if ($action == 'search') {

            $kodeProduk = $request->input('kode_produk');
            $produk = Produk::where('kode_produk', $kodeProduk)->first();

            // Pastikan untuk menginisialisasi variabel $produk
            return view('produk.create', compact('produk'));
        }

        $data = $request->validate([
            'kode_produk' => 'required|unique:produk|max:12',
            'nama_produk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'status_produk' => 'required|in:tunai,kredit,konsinyasi',
            'kelompok_produk_id' => 'required|exists:kelompok_produk,id',
            'stok' => 'required|integer',
        ]);

        Produk::create($data);

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }



    public function edit(Produk $produk)
    {
        $kelompokProduks = KelompokProduk::all();
        return view('produk.edit', compact('produk', 'kelompokProduks'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk,' . $produk->kode_produk . ',kode_produk',
            'nama_produk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'status_produk' => 'required|in:tunai,kredit,konsinyasi',
            'kelompok_produk_id' => 'required|exists:kelompok_produk,id',
            'stok' => 'required|integer',
        ]);

        $produk->update($data);

        return redirect()->route('produk.index', $produk)
            ->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
