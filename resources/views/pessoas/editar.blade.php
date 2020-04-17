@extends('template.app')

@section('content')
<div class="row">
  <div class="col l6 s12">
    <div class="card-panel z-depth-5">
      <form action="{{ url('/pessoas/update') }}" method="POST" autocomplete="off">
        {{ csrf_field() }}
        <h4>Atualizar</h4>
        <div class="row">
          <div class="input-field col s12">
            <input name="nome" value={{ $pessoa->nome }} type="text" placeholder="Nome" class="grey-text text-darken-4">
            @if ($errors->has('nome'))
              <span class="helper-text red-text">{{$errors->first('nome')}}</span>
            @endif
            <input name="id" value={{ $pessoa->id }} type="hidden">
          </div>
          <div class="right-align col s12">
            <button class="btn grey darken-4" type="submit">
              Atualizar
            </button>
          </div>
        </div>
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