@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3"></h3>
                <h3 class="mb-3">Editar Condomínio</h3>
            </div>
        </div>
        <form action="{{ route('condominios.update', $condominio->id) }}" method="POST">
            @method('PUT')
            @csrf
            @include('condominios.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')