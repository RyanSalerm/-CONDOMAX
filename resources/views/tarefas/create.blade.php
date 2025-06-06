@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Criar Tarefa</h3>
            </div>
        </div>
        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf
            @include('tarefas.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')