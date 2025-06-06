<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Condominium;
use App\Models\Task;
use App\Models\Provider;

class DashboardController extends Controller
{
    public function index()
    {
        $clientesCount = User::count();
        $condominiosCount = Condominium::count();
        $tarefasCount = Task::count();
        $prestadoresCount = Provider::count();
        
        $tasks = Task::all();

        $statusCounts = [
            'Não iniciada' => 0,
            'Em andamento' => 0,
            'Em execução' => 0,
            'Concluída' => 0,
        ];
        foreach ($tasks as $task) {
            if (array_key_exists($task->status, $statusCounts)) {
                $statusCounts[$task->status]++;
            }
        }
        $labels = array_keys($statusCounts);
        $data = array_values($statusCounts);

    $tarefasFiltradas = [];
    foreach ($tasks as $task) {
        if ($task->status != 'Concluída') {
            $condominio = Condominium::find($task->condominium_id);

            // Verifica se encontrou o condomínio
            $tarefasFiltradas[] = [
                'id' => $task->id,
                'Condomínio' => [
                    'id' => $condominio?->id,
                    'nome' => $condominio?->name ?? 'Desconhecido',
                ],
                'Meses de Vencimento' => $task->due_months,
                'Status' => $task->status,
            ];
        }
    }
        return view('dashboard', compact(
            'clientesCount',
            'condominiosCount',
            'tarefasCount',
            'prestadoresCount',
            'labels',             
            'data',
            'tarefasFiltradas'
        ));
    }
}

