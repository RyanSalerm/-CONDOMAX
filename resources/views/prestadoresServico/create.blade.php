@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3"></h3>
                <h3 class="mb-3">Criar Prestador</h3>
            </div>
        </div>
        <form action="{{ route('prestadores.store') }}" method="POST">
                @csrf
                @include('prestadoresServico.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')