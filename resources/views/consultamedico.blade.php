@extends('components.main')

@section('title', '')
@section('content')


<div class="d-flex flex-column align-items-center col-8 m-3 p-3 pb-5 border border-dark rounded-sm">

        <div class="p-2 font-weight-bolder h2">Marcar Consulta</div>

        @if (count($resultado) != 0)

        <form action="/marcarconsulta" method="POST" class="was-validated col-8 d-flex flex-column justify-content-center align-items-center">
                @csrf
                <div class="mb-3">

                        <label class="form-label">Paciente:</label>
                        <label class="form-label h3">{{ $resultado->paciente }}</label>
                        <input type="hidden" name="paciente" value="{{ $resultado->paciente }}">

                </div>

                <div class="mb-3">
                        <label class="form-label">Médico:</label>
                        <select class="form-control" name="medico">

                                @foreach($resultado as $dado)
                                <option value="{{ $dado->medico }} ({{ $dado->especialidade}})">
                                        {{ $dado->medico }} ({{ $dado->especialidade}})
                                </option>
                                @endforeach

                        </select>

                        <div class="valid-feedback">Válido</div>
                        <div class="invalid-feedback">Item Obrigatório</div>
                </div>


                <div class="mb-3">
                        <label class="form-label">Data:</label>
                        <input type="date" pattern="\d{4}-\d{2}-\d{2}" name='dia' class="form-control" required>
                        <div class="valid-feedback">Válido</div>
                        <div class="invalid-feedback">Item Obrigatório</div>
                </div>


                @if($resultado->responsavel)

                <div class="d-flex flex-column">
                        <span class="text-muted">O paciente é menor de 18 anos.</span>
                        <span class="text-muted">Um responsável maior de idade deve ser declarado.</span>

                        <label class="form-label">Nome do responsável:</label>
                        <input type="text" name='responsavel' class="form-control" required>
                        <div class="valid-feedback">Válido</div>
                        <div class="invalid-feedback">Item Obrigatório</div>

                        <label class="form-label">CPF do responsável:</label>
                        <input type="number" name='cpfresponsavel' class="form-control" required>
                        <div class="valid-feedback">Válido</div>
                        <div class="invalid-feedback">Item Obrigatório</div>

                </div>

                @else

                <input type="hidden" name="responsavel" value="0">
                <input type="hidden" name="cpfresponsavel" value="0">

                @endif


                <button type="submit" class="btn btn-primary my-3">Cadastrar</button>

        </form>

        @endif


</div>


@endsection