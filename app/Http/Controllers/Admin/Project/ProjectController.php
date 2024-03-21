<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $project_acc = 'here show';
        $project_menu = 'active';
        $projects = Project::withTrashed()->get();

        return view('admin.project.project.index', compact('project_acc','project_menu','projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $project_acc = 'here show';
        $project_menu = 'active';
        return view('admin.project.project.create', compact('project_acc', 'project_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $project = $request->validated();
        Project::insert($project);
        return redirect()->route('admin.project.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = Project::findOrFail($id);
        return view('admin.project.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project_acc = 'here show';
        $project_menu = 'active';
        $project = Project::findOrFail($id);
        return view('admin.project.project.edit', compact('project_acc', 'project_menu', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        //
        $project = $request->validated();
        Project::findOrFail($id)->update($project);
        return redirect()->route('admin.project.project.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Project::findOrFail($id)->delete();
        return redirect()->route('admin.project.project.index');
    }
}
