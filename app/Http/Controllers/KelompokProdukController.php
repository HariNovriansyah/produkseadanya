<?php

namespace App\Http\Controllers;

use App\Models\KelompokProduk;
use Illuminate\Http\Request;

class KelompokProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompokProduk = KelompokProduk::all();
        return view('kelompokproduk.index', compact('kelompokProduk'));
    }

    public function create()
    {
        return view('kelompokproduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KelompokProduk::create($request->all());

        return redirect()->route('kelompokproduk.index')->with('success', 'Kelompok Produk berhasil ditambahkan');
    }


    public function edit($id)
    {
        $kelompokProduk = KelompokProduk::find($id);
        return view('kelompokproduk.edit', compact('kelompokProduk'));
    }

    public function update(Request $request, string $id)
    {
        KelompokProduk::findOrFail($id)->update([
            'nama_kelompok' => $request->nama_kelompok,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kelompokproduk.index')
            ->with('success', 'kelompok produk berhasil diperbarui');
    }

    
    public function destroy(KelompokProduk $kelompokproduk)
    {
        $kelompokproduk->delete();

        return redirect()->route('kelompokproduk.index')->with('success', 'Kelompok Produk berhasil dihapus');
    }
}
