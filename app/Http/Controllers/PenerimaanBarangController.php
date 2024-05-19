<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PenerimaanBarang;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenerimaanBarangController extends Controller
{
    public function index(): View
    {
        $dataPenerimaanBarang = PenerimaanBarang::latest()->paginate(10);
        return view('penerimaan_barang.index', compact('dataPenerimaanBarang'));
    }
    public function create(): View
    {
        $dataBarang = Barang::all();
        return view('penerimaan_barang.create', compact('dataBarang'));
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'tgl_penyimpanan'      => 'required',
            'alamat'               => 'required',
            'kode_barang'          => 'required',
            'quantity'             => 'required',
        ]);


        PenerimaanBarang::create([
            'tgl_penyimpanan'       => $request->tgl_penyimpanan,
            'alamat'                => $request->alamat,
            'kode_barang'           => $request->kode_barang,
            'quantity'              => $request->quantity,

        ]);
        //redirect to index
        return redirect()->route('penerimaan_barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id_penerimaan): View
    {
        $dataPenerimaanBarang = PenerimaanBarang::findOrFail($id_penerimaan);

        return view('penerimaan_barang.show', compact('dataPenerimaanBarang'));
    }

    public function edit($id_penerimaan): View
    {
        $dataPenerimaanBarang = PenerimaanBarang::findOrFail($id_penerimaan);
        return view('penerimaan_barang.edit', compact('dataPenerimaanBarang'));
    }


    public function update(Request $request, $id_penerimaan): RedirectResponse
    {
        //validate form
        $request->validate([
            'tgl_penyimpanan'      => 'required',
            'alamat'               => 'required',
            'quantity'             => 'required',
        ]);

        $dataPenerimaanBarang = PenerimaanBarang::findOrFail($id_penerimaan);
        $dataPenerimaanBarang->update([
            'tgl_penyimpanan'       => $request->tgl_penyimpanan,
            'alamat'                => $request->alamat,
            'quantity'              => $request->quantity,
        ]);

        return redirect()->route('penerimaan_barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_penerimaan): RedirectResponse
    {
        $dataPenerimaanBarang = PenerimaanBarang::findOrFail($id_penerimaan);
        $dataPenerimaanBarang->delete();
        return redirect()->route('penerimaan_barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
