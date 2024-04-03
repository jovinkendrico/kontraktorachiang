<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KasKeluar;
use App\Models\PembelianBarang;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $pembelians = PembelianBarang::all();
        $kaskeluars = KasKeluar::all();
        $jumlahProject = Project::count();
        $projects = Project::all();
        $projectLists = Project::paginate(3);
        $profit = 0;
        // Count records with deleted_at set
        $deletedProject = Project::whereNotNull('deleted_at')->count();
        // Count records without deleted_at set
        $activeProject = Project::whereNull('deleted_at')->count();
        $lowestProfit = $projects->min(function ($project) {
            return $project->getProfit();
        });
        $highestProfit = $projects->max(function ($project) {
            return $project->getProfit();
        });
        foreach ($projects as $project) {
            $profit += $project->getProfit();
        }
        $data = ['labels' => ['Active', 'Non Active', 'Completed'],
            'data' => [$activeProject , 2, 4],
        ];
        $averageProfit = $profit / $activeProject;
        return view('dashboard', compact('projectLists','projects', 'jumlahProject', 'deletedProject', 'activeProject', 'profit', 'averageProfit', 'lowestProfit','highestProfit','data'));
    }
}
