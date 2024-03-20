<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\PembelianBarang\StorePembelianBarangRequest;
use App\Http\Requests\Admin\Project\PembelianBarang\UpdatePembelianBarangRequest;
use App\Models\PembelianBarang;
use Illuminate\Http\Request;

class PembelianBarangController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pembelianbarangs = PembelianBarang::all();
        $acc = 'here show';
        $pembelian_barang_menu = 'active';
        return view('admin.project.pembelianbarang.index', compact('pembelian_barang_menu', 'acc', 'pembelianbarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $acc = 'here show';
        $pembelian_barang_menu = 'active';
        return view('admin.project.pembelianbarang.create', compact('acc', 'pembelian_barang_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianBarangRequest $request)
    {
        $pembelianbarang = $request->validated();
        PembelianBarang::insert($pembelianbarang);
        return redirect()->route('admin.project.pembelianbarang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $acc = 'here show';
        $pembelian_barang_menu = 'active';
        $pembelianbarang = PembelianBarang::findOrFail($id);
        return view('admin.project.pembelianbarang.show', compact('acc', 'pembelian_barang_menu', 'pembelianbarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $acc = 'here show';
        $pembelian_barang_menu = 'active';
        $pembelianbarang = PembelianBarang::findOrFail($id);
        return view('admin.project.pembelianbarang.edit', compact('pembelianbarang', 'acc', 'pembelian_barang_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianBarangRequest $request, string $id)
    {
        //
        $pembelianbarang = $request->validated();
        PembelianBarang::findOrFail($id)->update($pembelianbarang);
        return redirect()->route('admin.project.pembelianbarang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PembelianBarang::findOrFail($id)->delete();
        return redirect()->route('admin.project.barang.index');
    }
}
