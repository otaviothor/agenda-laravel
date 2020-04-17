<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Pessoa;
use App\Telefone;

class PessoasController extends Controller
{
    private $telefones_controller;
    private $pessoa;


    // metodo construtor
    public function __construct(TelefonesController $telefones_controller){
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }

    // metodo inicial para listagem dos registros
    public function index($letra){
        $list_pessoas = Pessoa::indexLetra($letra); 
        return view('pessoas.index', [
            'pessoas' => $list_pessoas,
            'criterio' => $letra
        ]);
    }

    // metodo para buscar registro no banco de dados
    public function buscar(Request $req)
    {
        $pessoas = Pessoa::busca($req->criterio);
        return view('pessoas.index', [
            'pessoas' => $pessoas, 
            'criterio' => $req->criterio
        ]);
    }

    // metodos para retornar as views solicitadas
    public function cadastroView(){
        return view('pessoas.cadastro');
    }

    public function excluirView($id){
        return view('pessoas.delete', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    public function editarView($id){
        return view('pessoas.editar', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    // metodos para consultar um registro no banco
    protected function getPessoa($id){
        return $this->pessoa->find($id);
    }

    // metodos de manipulacao do banco
    public function store(Request $req){

        $validacao = $this->validacao($req->all());

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao->errors())->withInput($req->all());
        }

        $pessoa = Pessoa::create($req->all());

        if ($req->ddd && $req->telefone) {
            $telefone = new telefone();
            $telefone->ddd = $req->ddd;
            $telefone->telefone = $req->telefone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
    
        return redirect('/pessoas')->with('message', 'Cadastro realizado com sucesso');
    }

    public function update(Request $req){

        $validacao = $this->validacao($req->all());

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao->errors())->withInput($req->all());
        }

        $pessoa = $this->getPessoa($req->id);
        $pessoa->update($req->all());
        return redirect('/pessoas');
    }

    public function destroy($id){
        $this->getPessoa($id)->delete();
        return redirect('/pessoas')->with('success', 'Registro excluido com sucesso');
    }

    // metodos para validacao dos campos
    private function validacao($data){
        
        if (array_key_exists('ddd', $data) && array_key_exists('telefone', $data)) {
            if ($data['ddd'] || $data['telefone']) {
                $regras['ddd'] = 'required|size:2';
                $regras['telefone'] = 'required';
            }
        }

        $regras['nome'] = 'required|min:3';

        $msg = [
            'nome.required' => 'preenche o campo aí irmão',
            'nome.min' => 'mínimo de 3 letras',
            'ddd.required' => 'preenche o campo aí irmão',
            'ddd.size' => 'dois digítos irmão',
            'telefone.required' => 'preenche o campo aí irmão'
        ];

        return Validator::make($data, $regras, $msg);
    }
}
