<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\Barang\StoreBarangRequest;
use App\Http\Requests\Admin\Master\Barang\UpdateBarangRequest;
use App\Models\Barang;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangs = Barang::withTrashed()->get();
        // return view('admin.master.barang.index', compact('barangs'));
        $master_acc = 'here show';
        $barang_menu = 'active';
        return view('admin.master.barang.index',compact('barang_menu','master_acc','barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $master_acc = 'here show';
        $barang_menu = 'active';
        return view('admin.master.barang.create',compact('master_acc','barang_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $barang = $request->validated();
        Barang::insert($barang);
        return redirect()->route('admin.master.barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $master_acc = 'here show';
        $barang_menu = 'active';
        $barang = Barang::findOrFail($id);
        return view('admin.master.barang.show', compact('master_acc','barang_menu','barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $master_acc = 'here show';
        $barang_menu = 'active';
        $barang = Barang::findOrFail($id);
        return view('admin.master.barang.edit', compact('master_acc','barang_menu','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, string $id)
    {
        //
        $barang = $request->validated();
        Barang::findOrFail($id)->update($barang);
        return redirect()->route('admin.master.barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barang = Barang::findOrFail($id)->delete();
        return redirect()->route('admin.master.barang.index');
    }
}
