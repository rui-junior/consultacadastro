<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_consultas;
use App\Models\Table_medicos;
use App\Models\Table_pacientes;
use App\Models\Table_especialidades;
// use Psy\Formatter\Formatter;

class EventController extends Controller
{

    public function index()
    {

        $dados = Table_consultas::all();
        return view('index', ['dados' => $dados]);
    }

    //functions Medicos
    public function getCadastrarMedico()
    {

        $dados = Table_medicos::all();
        $dadosespecialidade = Table_especialidades::all();
        $dados->especialidades = $dadosespecialidade;
        return view('cadastrarmedico', ['dados' => $dados]);
    }

    public function createMedico(Request $request)
    {
        $medico = new Table_medicos;

        $medico->medico = $request->medico;
        $medico->especialidade = $request->especialidade;
        $medico->crm = $request->crm;

        $medico->save();

        return redirect('/cadastrarmedico');
    }

    public function deleteMedico($id)
    {

        Table_medicos::findOrFail($id)->delete();

        return redirect('/cadastrarmedico');
    }

    public function editMedico($id)
    {

        $edit = Table_medicos::findOrFail($id);

        return view('updatemedico', ['edit' => $edit]);
    }

    public function updateMedico(Request $request)
    {

        Table_medicos::where('id', $request->id)->update($request->except(['_token', '_method']));

        return redirect('/cadastrarmedico');
    }


    //functions pacientes
    public function getCadastrarPaciente()
    {

        $dados = Table_pacientes::all();
        return view('cadastrarpaciente', ['dados' => $dados]);
    }

    public function createPaciente(Request $request)
    {
        $dadospaciente = new Table_pacientes;

        $dadospaciente->paciente = $request->paciente;
        $dadospaciente->nascimento = $request->nascimento;
        $dadospaciente->cpf = $request->cpf;
        $dadospaciente->telefone = $request->telefone;
        $dadospaciente->email = $request->email;
        $dadospaciente->cep = $request->cep;
        $dadospaciente->rua = $request->rua;
        $dadospaciente->numero = $request->numero;

        $dadospaciente->save();

        return redirect('/cadastrarpaciente');
    }

    public function deletePaciente($id)
    {

        Table_pacientes::findOrFail($id)->delete();

        return redirect('/cadastrarpaciente');
    }

    public function editPaciente($id)
    {

        $edit = Table_pacientes::findOrFail($id);

        return view('updatepaciente', ['edit' => $edit]);
    }

    public function updatePaciente(Request $request)
    {

        Table_pacientes::where('id', $request->id)->update($request->except(['_token', '_method']));

        return redirect('/cadastrarpaciente');
    }


    // functions especialidade
    public function getCadastrarEspecialidade(){

        $dados = Table_especialidades::all();
        return view('cadastrarespecialidade', ['dados' => $dados]);

    }

    public function createEspecialidade(Request $request)
    {
        $dadosespecialidade = new Table_especialidades;
        $dadosespecialidade->especialidade = $request->especialidade;
        $dadosespecialidade->save();

        return redirect('/cadastrarespecialidade');
    }


    //function Consulta
    public function getCadastrarConsulta()
    {

        $dadospaciente = Table_pacientes::all();

        return view('marcarconsulta', ['dadospaciente' => $dadospaciente]);
    }

    public function getConsultaPaciente()
    {

        $id = request('paciente');

        $dadospaciente = Table_pacientes::findOrFail($id);
        $nomepaciente = $dadospaciente->paciente;
        $data = $dadospaciente->nascimento;
        $data = strtotime($data);
        $datadenascimento = date('d/m/Y', $data);
        $anos = $this->calcData($datadenascimento);

        
        if ($anos < 12) {

            $resultado = Table_medicos::where('especialidade', '=', 'pediatria')->get();
            $resultado->responsavel = true;
            $resultado->paciente = $nomepaciente;
            
        } else if($anos < 18) {
            
            $resultado = Table_medicos::all();
            $resultado->responsavel = true;
            $resultado->paciente = $nomepaciente;
            
        } else {
            
            $resultado = Table_medicos::all();
            $resultado->responsavel = false;
            $resultado->paciente = $nomepaciente;

        }


        return view('consultamedico', ['resultado' => $resultado]);
    }
    
    public function createConsulta(Request $request)
    {

        $dadosconsulta = new Table_consultas;

        $dadosconsulta->paciente = $request->paciente;
        $dadosconsulta->medico = $request->medico;
        $dadosconsulta->dia = $request->dia;
        $dadosconsulta->responsavel = $request->responsavel;
        $dadosconsulta->cpfresponsavel = $request->cpfresponsavel;

        $dadosconsulta->save();

        return redirect('/marcarconsulta');
        
    }

    public function calcData($datadenascimento)
    {

        $nascimento = explode('/', $datadenascimento);
        $data = date('d/m/Y');
        $data = explode('/', $data); 
        $anos = $data[2] - $nascimento[2];
        if ($nascimento[1] > $data[1]) return $anos - 1; 

        if ($nascimento[1] == $data[1]){ 

            if ($nascimento[0] <= $data[0]) {
                return $anos;
            } else {
                return $anos - 1;
            }

        }

        return $anos;
    }

}
