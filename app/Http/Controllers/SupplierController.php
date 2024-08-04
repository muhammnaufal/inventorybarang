<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSupplier = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('dataSupplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'nama_supplier'      => 'required',
            'telepon'      => 'required',
            'alamat'      => 'required',
        ]);


        Supplier::create([
            'nama_supplier'       => $request->nama_supplier,
            'telepon'               => $request->telepon,
            'alamat'            => $request->alamat,

        ]);
        //redirect to index
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataSupplier = Supplier::findOrFail($id);

        return view('supplier.show', compact('dataSupplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataSupplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('dataSupplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama_supplier'      => 'required',
            'telepon'      => 'required',
            'alamat'      => 'required',
        ]);

        $dataSupplier = Supplier::findOrFail($id);
        $dataSupplier->update([
            'nama_supplier'       => $request->nama_supplier,
            'telepon'               => $request->telepon,
            'alamat'            => $request->alamat,

        ]);
        //redirect to index
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataSupplier = Supplier::findOrFail($id);
        $dataSupplier->delete();
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
