<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\OrderBarang;
use App\Models\OrderDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBarang = OrderBarang::latest()->paginate(10);
        return view('orderbarang.index', compact('dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataSupplier = Supplier::all();
        $dataBarang = Barang::all();
        return view('orderbarang.create', compact('dataSupplier', 'dataBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate form
        $request->validate([
            'tanggal'      => 'required',
            'kode_supplier'      => 'required',
            'ppn'      => 'required',
            'kode_barang' => 'required',
            'quantity' => 'required',
        ]);


        $order = OrderBarang::create([
            'tanggal'       => $request->tanggal,
            'kode_supplier'               => $request->kode_supplier,
            'ppn'            => $request->ppn,
        ]);

        OrderDetail::create([
            'no_po' => $order->no_po,
            'kode_barang' => $request->kode_barang,
            'quantity' => $request->quantity,
        ]);

        //redirect to index
        return redirect()->route('orderbarang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dataBarang = OrderBarang::findOrFail($id);

        return view('orderbarang.show', compact('dataBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataSupplier = Supplier::all();
        $dataBarang = OrderBarang::findOrFail($id);
        return view('orderbarang.edit', compact('dataBarang', 'dataSupplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'tanggal'      => 'required',
            'kode_supplier'      => 'required',
            'ppn'      => 'required',
        ]);

        $dataBarang = OrderBarang::findOrFail($id);
        $dataBarang->update([
            'tanggal'       => $request->tanggal,
            'kode_supplier' => $request->kode_supplier,
            'ppn'            => $request->ppn,

        ]);
        //redirect to index
        return redirect()->route('orderbarang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataBarang = OrderBarang::findOrFail($id);
        $dataBarang->delete();
        return redirect()->route('orderbarang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
