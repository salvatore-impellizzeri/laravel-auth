<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::get();
        return view("admin.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create", compact("projects"));
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
            "src"=> "nullable|max:500|url",
            "visible"=> "required|boolean",
        ]);

        $project = new Project();
        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->src = $data["src"];
        $project->visible = $data["visible"];
        $project->save();

        return view ('admin.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $request->validate([
            "title"=> "",
            "description"=> "",
            "src"=> "",
            "visible"=> "",
        ]);

        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->src = $data["src"];
        $project->visible = $data["visible"];
        $project->save();


        return view ('admin.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.index');
    }
}
