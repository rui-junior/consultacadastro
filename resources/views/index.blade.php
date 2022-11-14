@extends('components.main')

@section('title', '')
@section('content')


<div class="d-flex flex-column justify-content-center align-items-center col-8 p-3 border border-dark rounded-sm">

    <div class="d-flex flex-column align-items-center col-8">

        <div class="h3">Sistema de Cadastro de Consulta</div>
        <div class="text=mutted">Consultas Cadastradas:</div>

        <div class="d-flex flex-column align-items-center flex-nowrap col-12">

            @if (count($dados) != 0)

                @foreach($dados as $dado)
                <div class="d-flex flex-row justify-content-between border-dark border-bottom my-2">

                    <div class="mr-auto px-3">Paciente: {{ $dado->paciente }}</div>
                    <div class="mr-auto px-3">Médico: {{ $dado->medico }}</div>
                    <div class="mr-auto px-3">Dia: {{ $dado->dia }}</div>

                    <div>

                        <form action="/cadastrarconsulta/{{ $dado->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info edit-btn btn-danger">Excluir</button>
                        </form>

                    </div>

                </div>
                @endforeach

            @else

                <div>Não há consultas cadastradas.</div>

            @endif


        </div>

    </div>

</div>


@endsection