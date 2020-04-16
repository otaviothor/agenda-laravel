<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'id',
        'ddd',
        'fone',

        // esse campo faz parte do relacionamento com a tabela pessoa
        'pessoa_id'
    ];

    protected $table = 'telefones';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id'); 
    }
}
