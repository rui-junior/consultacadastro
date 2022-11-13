@extends('components.main')

@section('title', 'titulo da pagina')
@section('content')

<div class="d-flex flex-row flex-wrap col-8">

    <div class="d-flex flex-column align-items-center col-12 mb-3 p-3 border border-dark rounded-sm">

        <div class="p-2 font-weight-bolder h2">Cadastro de Profissional:</div>

        <form action="/cadastrarmedico" method="POST" class="was-validated d-flex flex-column flex-wrap justify-content-around">
            @csrf
            <div class="mb-3 mt-3">
                <label class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" name="medico" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Especialidade:</label>

                <select class="form-control" name="especialidade">

                    @foreach($dados->especialidades as $dado)
                    <option value="{{ $dado->especialidade }}">
                        {{ $dado->especialidade }}
                    </option>
                    @endforeach

                </select>

                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="mb-3">
                <label class="form-label">CRM:</label>
                <input type="text" class="form-control" name="crm" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <button type="submit" class="btn btn-primary mh-10">Cadastrar</button>

        </form>

    </div>

    <div class="d-flex flex-row justify-content-center flex-wrap col-12 p-3 border border-dark rounded-sm">

        @if (count($dados) != 0)

        <div class="d-flex flex-row justify-content-around h5 col-8">

            <p>Médicos cadastrados:</p>

        </div>


        @foreach($dados as $dado)
        <div class="d-flex flex-row justify-content-around border-dark border-bottom col-8 pt-3">

            <div class="mr-auto">

                {{ $dado->medico }} ({{ $dado->especialidade }})

            </div>

            <div>

                <form action="/cadastrarmedico/{{ $dado->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info edit-btn btn-danger">Excluir</button>
                </form>

            </div>

            <div>

                <a href="/cadastrarmedico/edit/{{ $dado->id }}">
                    <button type="submit" class="btn btn-info edit-btn btn-warning">Editar</button>
                </a>

            </div>


        </div>
        @endforeach

        @else

        <div class="d-flex flex-row justify-content-around h3 col-8"> Não há nenhum médico cadastrado!</div>

        @endif

    </div>

</div>


@endsection