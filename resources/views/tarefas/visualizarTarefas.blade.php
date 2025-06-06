@extends('modelo.paginaInicio')

@section('conteudo')
    <x-dynamic-table :tableName="'Tarefas'" 
    :columns="[
        'id' => 'ID',
        'description' => 'Descrição',
        'condominium_id' => 'Condomínio',
        'maintenance_date' => 'Data',
        'due_months' => 'Prazo (m)',
        'repeat_months' => 'Repetir (m)',
        'priority' => 'Prioridade',
        'status' => 'Status',
        'situation' => 'Situação',
        'notes' => 'Observações',
        'provider_id' => 'Prestador',
        ]" 
        :records="$tarefas"
        editRoute="tarefas.edit" 
        deleteRoute="tarefas.destroy" 
        createRoute="tarefas.create" 
        />
@endsection

@extends('modelo.paginaFim')