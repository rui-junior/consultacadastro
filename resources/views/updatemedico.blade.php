@extends('components.main')

@section('title', '')
@section('content')

<div class="d-flex flex-row flex-wrap col-8">

    <div class="d-flex flex-column align-items-center col-12 mb-3 p-3 border border-dark rounded-sm">

        <div class="p-2 font-weight-bolder h2">Atualização de Profissional:</div>

        <form action="/cadastrarmedico/update/{{ $edit->id }}" method="POST" class="was-validated d-flex flex-column flex-wrap justify-content-around">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-3">
                <label class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" name="medico" placeholder="{{$edit->medico}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Especialidade:</label>
                <input type="text" class="form-control" name="especialidade" placeholder="{{$edit->especialidade}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="mb-3">
                <label class="form-label">CRM:</label>
                <input type="text" class="form-control" name="crm" placeholder="{{$edit->crm}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <button type="submit" class="btn btn-primary mh-10">Cadastrar</button>

        </form>

    </div>

    

</div>


@endsection