<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($projectId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();
        $tasks = Task::where('project_id', $project->id)->orderBy('due_date', 'asc')->get();

        return view('tasks', compact(['tasks', 'project']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($projectId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();
        
        return view('create_tasks', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $projectId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();

        $data = $request->validate([
        'title'             => ['required', 'string', 'min:3'],
        'description'       => ['nullable', 'string'],
        'status'            => ['required', 'in:pending,in_progress,completed'],
        'priority'          => ['required', 'in:low,medium,high'],
        'due_date'          => ['required', 'date', 'after_or_equal:today', ],
        ], [
        'title.required'    => 'Título obrigatório.',
        'title.min'         => 'Título mínimo :min letras.',
        'status.required'   => 'Status obrigatório.',
        'status.in'         => 'Status inválido.',
        'priority.required' => 'Prioridade obrigatória.',
        'priority.in'       => 'Prioridade inválida.',
        'due_date.required' => 'Data Obrigatória.',
        'due_date.*'        => 'Data inválida.'
        ]);

        $data['project_id'] = $project->id;
        
        $task = Task::create($data);

        return redirect()->route('tasks.index', $project->id)->with('success', "Tarefa {$task->title}, criada com sucesso");
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
    public function edit(string $projectId, $taskId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();
        $task = Task::where('project_id', $project->id)->where('id', $taskId)->firstOrFail();

        return view('edit_task', compact(['project', 'task']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $projectId, string $taskId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();

        $data = $request->validate([
        'title'             => ['required', 'string', 'min:3'],
        'description'       => ['nullable', 'string'],
        'status'            => ['required', 'in:pending,in_progress,completed'],
        'priority'          => ['required', 'in:low,medium,high'],
        'due_date'          => ['required', 'date', 'after_or_equal:today', ],
        ], [
        'title.required'    => 'Título obrigatório.',
        'title.min'         => 'Título mínimo :min letras.',
        'status.required'   => 'Status obrigatório.',
        'status.in'         => 'Status inválido.',
        'priority.required' => 'Prioridade obrigatória.',
        'priority.in'       => 'Prioridade inválida.',
        'due_date.required' => 'Data Obrigatória.',
        'due_date.*'        => 'Data inválida.'
        ]);

        $data['project_id'] = $project->id;
        
        $task = Task::where('project_id', $project->id)->where('id', $taskId)->firstOrFail();
        $task->update($data);

        return redirect()->route('tasks.index', $project->id)->with('success', "Tarefa {$task->title}, editada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $projectId, string $taskId)
    {
        $project = Project::where('user_id', Auth::id())->where('id', $projectId)->firstOrFail();
        Task::where('project_id', $project->id)->where('id', $taskId)->delete();
        
        return redirect()->route('tasks.index', $projectId);
    }
}
