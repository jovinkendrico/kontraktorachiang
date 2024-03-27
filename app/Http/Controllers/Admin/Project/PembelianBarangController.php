<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\PembelianBarang\StorePembelianBarangRequest;
use App\Http\Requests\Admin\Project\PembelianBarang\UpdatePembelianBarangRequest;
use App\Models\Barang;
use App\Models\DetailPembelianBarang;
use App\Models\PembelianBarang;
use App\Models\Project;
use Illuminate\Http\Request;

class PembelianBarangController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $pembelianbarangs = PembelianBarang::where('project_id', $id)->get();
        $project = Project::findOrFail($id);
        $project_acc = 'here show';
        $project_menu = 'active';
        return view('admin.project.pembelianbarang.index', compact('project_menu', 'project_acc', 'pembelianbarangs', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $project_acc = 'here show';
        $project_menu = 'active';
        $project = Project::findOrFail($id);
        $barangs = Barang::all();
        return view('admin.project.pembelianbarang.create', compact('project_acc', 'barangs', 'project_menu', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianBarangRequest $request)
    {
        $pembelianbarang = $request->validated();
        $index = $pembelianbarang['project_id'];
        // $pembelian = PembelianBarang::insert($pembelianbarang);
        $pembelianHeader = PembelianBarang::create([
            'tanggal'=> $pembelianbarang['tanggal'],
            'jatuh_tempo'=> $pembelianbarang['jatuh_tempo'],
            'project_id'=> $pembelianbarang['project_id'],
            'supplier'=> $pembelianbarang['supplier'],
            'status'=> $pembelianbarang['status'],
        ]);

        $pembelianId = $pembelianHeader->id;

        $tableData = json_decode($pembelianbarang['tableData']);
        foreach($tableData as $table){
            DetailPembelianBarang::create([
                'pembelian_barang_id' => $pembelianId,
                'barang_id' => $table->id,
                'merk' => $table->Merk,
                'qty' => $table->QTY,
                'uom' => $table->Uom,
                'harga' => $table->Harga,
            ]);
        }
        return redirect()->route('admin.project.pembelianbarang.index',$index);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project_acc = 'here show';
        $project_menu = 'active';
        $pembelianbarang = PembelianBarang::findOrFail($id);
        return view('admin.project.pembelianbarang.show', compact('project_acc', 'project_menu', 'pembelianbarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project_acc = 'here show';
        $project_menu = 'active';
        $pembelianbarang = PembelianBarang::findOrFail($id);
        return view('admin.project.pembelianbarang.edit', compact('pembelianbarang', 'project_acc', 'project_menu'));
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
        return redirect()->route('admin.project.pembelianbarang.index');
    }
}
