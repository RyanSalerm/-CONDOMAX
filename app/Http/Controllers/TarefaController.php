<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Condominium;
use App\Models\Provider;
use App\Http\Requests\TarefaRequest;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Task::paginate(10);
        return view('tarefas.visualizarTarefas', compact('tarefas'));
    }

    public function create()
    {
        $condominiums = Condominium::all();
        $providers = Provider::all();
        return view('tarefas.create', compact('condominiums', 'providers'));
    }

    public function store(TarefaRequest $request)
    {
        Task::create([
            'description' => $request->description,
            'condominium_id' => $request->condominium_id,
            'maintenance_date' => $request->maintenance_date,
            'due_months' => $request->due_months,
            'repeat_months' => $request->repeat_months,
            'priority' => $request->priority,
            'status' => $request->status,
            'situation' => $request->situation,
            'notes' => $request->notes,
            'provider_id' => $request->provider_id,
        ]);

        return redirect()->route('tarefas.visualizarTarefas')->with('mensagem', 'Tarefa criada com sucesso');
    }

    public function show(string $id)
    {

    }

    public function edit(Task $tarefa)
    {
        $condominiums = Condominium::all();
        $providers = Provider::all();
        return view('tarefas.edit', compact('tarefa', 'condominiums', 'providers'));
    }

    public function update(Request $request, string $id){
        $tarefas = Task::findOrFail($id);
        $dados = [
            'description' => $request->description,
            'condominium_id' => $request->condominium_id,
            'maintenance_date' => $request->maintenance_date,
            'due_months' => $request->due_months,
            'repeat_months' => $request->repeat_months,
            'priority' => $request->priority,
            'status' => $request->status,
            'situation' => $request->situation,
            'notes' => $request->notes,
            'provider_id' => $request->provider_id,
        ];
        $tarefas->update($dados);
        return redirect()->route('tarefas.visualizarTarefas')->with('mensagem', 'Tarefa atualizada com sucesso');
    }

    public function destroy(string $id)
    {
        $tarefas = Task::findOrFail($id);
        $tarefas->delete();
        return redirect()->route('tarefas.visualizarTarefas')->with('mensagem', 'Tarefa excluída com sucesso');
    }
}
