@extends('template.app')

@section('content')
<div class="row">
  <div class="col l6 m8 s12 offset-l3 offset-m2">
    <div class="card-panel z-depth-5">
      <form action="{{ url('/pessoas/store') }}" method="POST" autocomplete="off">
        {{ csrf_field() }}
        <h4>Cadastro</h4>
        <div class="row">
          <div class="input-field col s12">
            <input name="nome" type="text" placeholder="Nome" class="grey-text text-darken-4">
          </div>
          <div class="input-field col s4">
            <input name="ddd" type="text" placeholder="DDD" class="grey-text text-darken-4">
          </div>
          <div class="input-field col s8">
            <input name="fone" type="text" placeholder="telefone" class="grey-text text-darken-4">
          </div>
          <div class="right-align col s12">
            <button class="btn grey darken-4" type="submit">
              Cadastrar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection