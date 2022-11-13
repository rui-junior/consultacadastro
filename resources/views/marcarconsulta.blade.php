@extends('components.main')

@section('title', 'titulo da pagina')
@section('content')


<div class="d-flex flex-column align-items-center col-8 m-3 p-3 border border-dark rounded-sm">

    <div class="p-2 font-weight-bolder h2">Marcar Consulta</div>


    @if (count($dadospaciente) != 0)

    <form action="/marcarconsultapaciente" method="GET" class="d-flex flex-wrap justify-content-around col-8">
    @csrf
        <div class="mb-3">
            <label class="form-label">Paciente:</label>

            <select class="form-control" name="paciente" onchange="this.form.submit()">

                @foreach($dadospaciente as $dado)
                <option value="{{ $dado->id }}">
                    {{ $dado->paciente }}
                </option>
                @endforeach

            </select>
        </div>

            
        <button type="submit" class="btn btn-primary mh-10">Cadastrar</button>


    </form>

    @else

    <div class="d-flex flex-row justify-content-around h3 col-8"> Não há nenhum paciente cadastrado!</div>

    @endif


</div>


@endsection