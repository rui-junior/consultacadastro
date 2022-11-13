@extends('components.main')

@section('title', 'titulo da pagina')
@section('content')

<div class="d-flex flex-column align-items-center col-10 m-3 p-3 border border-dark rounded-sm">

    <span class="h1">Sistema de Cadastro de Consultas Médicas</span>
    <p class="lead">Consultas cadastradas:</p>

    <div class="col-6 d-flex justify-content-center flex-column">

        @if (count($dados) != 0)

            <div class="d-flex flex-row justify-content-around h4">

                <p>Paciente</p>
                <p>Medico(Especialidade)</p>
                <p>Data</p>

            </div>


            @foreach($dados as $dado)
            <div class="d-flex flex-row justify-content-around">

                <p>{{ $dado->paciente }}</p>
                <p>{{ $dado->medico }} ({{ $dado->especialidade }})</p>
                <p>{{ $dado->dia }}</p>

            </div>
            @endforeach

        @else

            <div class="d-flex flex-row justify-content-around h4 pb-5"> Não há nenhuma consulta cadastrada</div>

        @endif

    </div>

</div>

@endsection