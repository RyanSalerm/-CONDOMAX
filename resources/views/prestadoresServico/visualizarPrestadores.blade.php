@extends('modelo.paginaInicio')

@section('conteudo')
    <x-dynamic-table 
    :tableName="'Prestadores'" 
    :columns="[
        'id' => 'ID',
        'name' => 'Nome',
        'area' => 'Área',
        'phone' => 'Telefone',
        'email' => 'Email',
        'notes' => 'Observações',
    ]" 
    :records="$prestadores"
    editRoute="prestadores.edit" 
    deleteRoute="prestadores.destroy" 
    createRoute="prestadores.create" 
    />
@endsection

@extends('modelo.paginaFim')