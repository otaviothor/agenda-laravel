<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Telefone;

class PessoasController extends Controller
{
    private $telefones_controller;
    private $pessoa;

    public function __construct(TelefonesController $telefones_controller)
    {
        $this->telefones_controller = $telefones_controller;
        $this->pessoa = new Pessoa();
    }

    public function index()
    {
        $list_pessoas = Pessoa::all(); 
        return view('pessoas.index', ['pessoas' => $list_pessoas]);
    }

    public function cadastroview()
    {
        return view('pessoas.cadastro');
    }

    public function store(Request $req)
    {

        $pessoa = Pessoa::create($req->all());

        if ($req->ddd && $req->fone) {
            $telefone = new Telefone();
            $telefone->ddd = $req->ddd;
            $telefone->telefone = $req->fone;
            $telefone->pessoa_id = $pessoa->id;
            $this->telefones_controller->store($telefone);
        }
    
        return redirect('/pessoas')->with('message', 'Cadastro realizado com sucesso');
    }

    public function editarView($id)
    {
        return view('pessoas.editar', [
            'pessoa' => $this->getPessoa($id)
        ]);
    }

    protected function getPessoa($id){
        return $this->pessoa->find($id);
    }

    public function update(Request $req)
    {
        $pessoa = $this->getPessoa($req->id);
        $pessoa->update($req->all());
        return redirect('/pessoas');
    }
}
