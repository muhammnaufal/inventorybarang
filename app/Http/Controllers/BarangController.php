<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(): View
    {
        $dataBarang = Barang::latest()->paginate(10);
        return view('barang.index', compact('dataBarang'));
    }
    public function create(): View
    {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'nama_barang'      => 'required',
            'unit'      => 'required|in:pcs,buah,lembar',
            'ukuran'      => 'required',
            'warna'      => 'required',
            'jenis'      => 'required',
            'harga_satuan'      => 'required|numeric',
            'stok'      => 'required|numeric',
        ]);


        Barang::create([
            'nama_barang'       => $request->nama_barang,
            'unit'               => $request->unit,
            'ukuran'            => $request->ukuran,
            'warna'             => $request->warna,
            'jenis'             => $request->jenis,
            'harga_satuan'      => $request->harga_satuan,
            'stok'              => $request->stok,

        ]);
        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($kode_barang): View
    {
        $dataBarang = Barang::findOrFail($kode_barang);

        return view('barang.show', compact('dataBarang'));
    }

    public function edit($kode_barang): View
    {
        $dataBarang = Barang::findOrFail($kode_barang);
        return view('barang.edit', compact('dataBarang'));
    }


    public function update(Request $request, $kode_barang): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_barang'      => 'required',
            'unit'      => 'required|in:pcs,buah,lembar',
            'ukuran'      => 'required',
            'warna'      => 'required',
            'jenis'      => 'required',
            'harga_satuan'      => 'required|numeric',
            'stok'      => 'required|numeric',
        ]);

        $dataBarang = Barang::findOrFail($kode_barang);
        $dataBarang->update([
            'nama_barang'       => $request->nama_barang,
            'unit'               => $request->unit,
            'ukuran'            => $request->ukuran,
            'warna'             => $request->warna,
            'jenis'             => $request->jenis,
            'harga_satuan'      => $request->harga_satuan,
            'stok'              => $request->stok,
        ]);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($kode_barang): RedirectResponse
    {
        $dataBarang = Barang::findOrFail($kode_barang);
        $dataBarang->delete();
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
