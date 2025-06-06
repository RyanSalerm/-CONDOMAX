@extends('modelo.paginaInicio')

@section('conteudo')
    <x-dynamic-table :tableName="'Condominios'" 
    :columns="[
        'id' => 'ID', 
        'name' => 'Nome', 
        'address' => 'Endereço', 
        'responsible' => 'Responsável', 
        'contact' => 'Contato',
    ]" 
    :records="$condominios"
    editRoute="condominios.edit" 
    deleteRoute="condominios.destroy" 
    createRoute="condominios.create" 
    />
@endsection

@extends('modelo.paginaFim')