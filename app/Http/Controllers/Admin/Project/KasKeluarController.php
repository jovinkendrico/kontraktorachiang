<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\KasKeluar\StoreKasKeluarRequest;
use App\Http\Requests\Admin\Project\KasKeluar\UpdateKasKeluarRequest;
use App\Models\KasKeluar;

class KasKeluarController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $kaskeluars = KasKeluar::where('project_id', $id)->get();
        $acc = 'here show';
        $kas_keluar_menu = 'active';
        return view('admin.project.kaskeluar.index', compact('kas_keluar_menu', 'acc', 'kaskeluars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $acc = 'here show';
        $kas_keluar_menu = 'active';
        return view('admin.project.kaskeluar.create', compact('acc', 'kas_keluar_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKasKeluarRequest $request)
    {
        $kaskeluar = $request->validated();
        KasKeluar::insert($kaskeluar);
        return redirect()->route('admin.project.kaskeluar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $acc = 'here show';
        $kas_keluar_menu = 'active';
        $kaskeluar = KasKeluar::findOrFail($id);
        return view('admin.project.kaskeluar.show', compact('acc', 'kas_keluar_menu', 'kaskeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $acc = 'here show';
        $kas_keluar_menu = 'active';
        $kaskeluar = KasKeluar::findOrFail($id);
        return view('admin.project.kaskeluar.edit', compact('kaskeluar', 'acc', 'kas_keluar_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKasKeluarRequest $request, string $id)
    {
        //
        $kaskeluar = $request->validated();
        $kaskeluar::findOrFail($id)->update($kaskeluar);
        return redirect()->route('admin.project.kaskeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        KasKeluar::findOrFail($id)->delete();
        return redirect()->route('admin.project.kaskeluar.index');
    }
}
