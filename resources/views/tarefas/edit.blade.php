@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3"></h3>
                <h3 class="mb-3">Editar Tarefa</h3>
            </div>
        </div>
        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
            @method('PUT')
            @csrf
            @include('tarefas.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')