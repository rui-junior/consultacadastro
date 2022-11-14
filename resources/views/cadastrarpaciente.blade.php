@extends('components.main')

@section('title', '')
@section('content')

<div class="d-flex flex-row flex-wrap col-8">

    <div class="d-flex flex-column justify-content-center align-items-center my-3 p-3 border border-dark rounded-sm col-12">

        <div class="p-2 font-weight-bolder h2">Cadastro de Paciente:</div>
        
        <form action="/cadastrarpaciente" method="POST" class="was-validated d-flex flex-wrap justify-content-around">
            @csrf
            <div class="px-3">
                <label class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" name="paciente" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="px-3">
                <label class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nascimento" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">CPF:</label>
                <input type="number" class="form-control" name="cpf" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            <div class="px-3">
                <label class="form-label">Telefone de contato:</label>
                <input type="number" class="form-control" name="telefone" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">e-mail:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            
            <div class="px-3">
                <label class="form-label">CEP:</label>
                <input type="number" class="form-control" name="cep" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">Rua:</label>
                <input type="text" class="form-control" name="rua" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>
            
            <div class="px-3">
                <label class="form-label">número:</label>
                <input type="number" class="form-control" name="numero" required>
                <div class="valid-feedback">Válido</div>
                <div class="invalid-feedback">Item Obrigatório</div>
            </div>

            
            <button type="submit" class="btn btn-primary mh-10">Cadastrar</button>
            
        </form>
        
    </div>
    
    <div class="d-flex flex-row justify-content-center flex-wrap col-12 p-3 border border-dark rounded-sm">
        
        @if (count($dados) != 0)
        
        <div class="d-flex flex-row justify-content-around h5 col-8">
            
            <p>Pacientes Cadastrados:</p>
            
        </div>
        
        
        @foreach($dados as $dado)
        <div class="d-flex flex-row justify-content-around border-dark border-bottom col-8 pt-3">

            <div class="mr-auto">

                {{ $dado->paciente }} ({{ $dado->cpf }})

            </div>

            <div>

                <form action="/cadastrarpaciente/{{ $dado->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info edit-btn btn-danger">Excluir</button>
                </form>

            </div>

            <div>

                <a href="/cadastrarpaciente/edit/{{ $dado->id }}">
                    <button type="submit" class="btn btn-info edit-btn btn-warning">Editar</button>
                </a>

            </div>

        </div>
        @endforeach

        @else

            <div class="d-flex flex-row justify-content-around h3 col-8"> Não há nenhum paciente cadastrado!</div>

        @endif

    </div>

</div>





@endsection