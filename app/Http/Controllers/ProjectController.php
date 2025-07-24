<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_projects');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'min:3'],
            'description'   => ['nullable', 'string']
        ], [
            'name.required' => 'Nome Obrigatório.',
            'name.min'      => 'Nome mínimo :min letras.'
        ]);

        $data['user_id'] = Auth::id();

        Project::create($data);

        return redirect('/projects')->with('success', 'Projeto criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('edit_projects', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'min:3'],
            'description'   => ['nullable', 'string']
        ], [
            'name.required' => 'Nome Obrigatório.',
            'name.min'      => 'Nome mínimo :min letras.'
        ]);

        $data['user_id'] = Auth::id();

        $project = Project::find($id);
        $project->update($data);

        return redirect('/projects')->with('success', 'Projeto editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
