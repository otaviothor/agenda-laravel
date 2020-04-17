@extends('template.app')

@section('content')
<div class="row">
  <div class="col m6 s12">
    <div class="card-panel z-depth-5">
      <form action="{{ url('/pessoas/store') }}" method="POST" autocomplete="off">
        {{ csrf_field() }}
        <h4>Deseja realmente excluir esse registro ?</h4>
        <a class="btn blue" href="{{ url("pessoas") }}"><i class="material-icons right">close</i>Cancelar</a>
        <a class="btn red" href="{{ url("pessoas/{$pessoa->id}/destroy") }}"><i class="material-icons right">delete</i>Confirmar</a>
      </form>
    </div>
  </div>
  <div class="col l6 s12">
    <div class="card-panel z-depth-5">
      <h4>{{ $pessoa->nome }}</h4>
      @foreach($pessoa->telefones as $telefone)
        <p>({{ $telefone->ddd }}) {{ $telefone->telefone }}</p>
      @endforeach
    </div>
  </div>
</div>
@endsection