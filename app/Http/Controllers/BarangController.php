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
            'kode_barang' =>'required',
            'nama_barang'      => 'required',
            'pcs'      => 'required|in:pcs,buah,lembar',
            'ukuran'      => 'required',
            'warna'      => 'required',
            'jenis'      => 'required',
            'harga_satuan'      => 'required|numeric',
            'stok'      => 'required|numeric',
        ]);

        Barang::create([
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       =>$request->nama_barang,
            'pcs'               =>$request->pcs,
            'ukuran'            =>$request->ukuran,
            'warna'             =>$request->warna,
            'jenis'             =>$request->jenis,
            'harga_satuan'      =>$request->harga_satuan,
            'stok'              =>$request->stok,

        ]);
        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $dataBarang = Barang::findOrFail($id);

        return view('barang.show', compact('dataBarang'));
    }

    public function edit(string $id): View
    {
        $dataBarang = Barang::findOrFail($id);
        return view('barang.edit', compact('dataBarang'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       =>$request->nama_barang,
            'pcs'               =>$request->pcs,
            'ukuran'            =>$request->ukuran,
            'warna'             =>$request->warna,
            'jenis'             =>$request->jenis,
            'harga_satuan'      =>$request->harga_satuan,
            'stok'              =>$request->stok,
        ]);

        $dataBarang = Barang::findOrFail($id);
        $dataBarang->update([
            'kode_barang'       => $request->kode_barang,
            'nama_barang'       =>$request->nama_barang,
            'pcs'               =>$request->pcs,
            'ukuran'            =>$request->ukuran,
            'warna'             =>$request->warna,
            'jenis'             =>$request->jenis,
            'harga_satuan'      =>$request->harga_satuan,
            'stok'              =>$request->stok,
        ]);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $dataBarang = Barang::findOrFail($id);
        $dataBarang->delete();
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
