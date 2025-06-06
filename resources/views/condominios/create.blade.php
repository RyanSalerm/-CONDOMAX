@extends('modelo.paginaInicio')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">Criar Condomínio</h3>
            </div>
        </div>
        <form action="{{ route('condominios.store') }}" method="POST">
            @csrf
            @include('condominios.formulario')
        </form>
    </div>
@endsection
@extends('modelo.paginaFim')