@extends('components.main')

@section('title', '')
@section('content')

<div class="d-flex flex-row flex-wrap col-8">

    <div class="d-flex flex-column justify-content-center align-items-center my-3 p-3 border border-dark rounded-sm col-12">

        <div class="p-2 font-weight-bolder h2">Atualização de Paciente:</div>
        
        <form action="/cadastrarpaciente/update/{{ $edit->id }}" method="POST" class="was-validated d-flex flex-wrap justify-content-around">
            @csrf
            @method('PUT')

            <div class="px-3">
                <label class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" name="paciente" placeholder="{{$edit->paciente}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="px-3">
                <label class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" placeholder="{{$edit->nascimento}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">CPF:</label>
                <input type="number" class="form-control" name="cpf" placeholder="{{$edit->cpf}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="px-3">
                <label class="form-label">Telefone de contato:</label>
                <input type="number" class="form-control" name="telefone" placeholder="{{$edit->telefone}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">e-mail:</label>
                <input type="email" class="form-control" name="email" placeholder="{{$edit->email}}" required>
            </div>
            
            <div class="px-3">
                <label class="form-label">CEP:</label>
                <input type="number" class="form-control" name="cep" placeholder="{{$edit->cep}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">Rua:</label>
                <input type="text" class="form-control" name="rua" placeholder="{{$edit->rua}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">número:</label>
                <input type="number" class="form-control" name="numero" placeholder="{{$edit->numero}}" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            
            <button type="submit" class="btn btn-primary mh-10">Cadastrar</button>
            
        </form>
        
    </div>

</div>

@endsection