<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "title"=> "required|max:250",
            "description"=> "required|min:20|max:1000",
            "src"=> "nullable|max:2000|url",
            "visible"=> "nullable",
        ]);

        $project = new Project();
        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->src = $data["src"];
        $project->visible = $data["visible"];
        $project->save();

        return view ('admin.projects.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $request->validate([
            "title"=> "required|max:250",
            "description"=> "required|min:20|max:1000",
            "src"=> "nullable|max:2000|url",
            "visible"=> "nullable",
        ]);

        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->src = $data["src"];
        $data['visible'] = isset($data['visible']);

        $project->update($data);


        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
