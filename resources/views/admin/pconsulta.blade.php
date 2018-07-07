@extends('adminlte::page')

@section('title', 'Cadastro de Parceiros')

@section('content_header')
    <h1>Lista de Parceiros</h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>  
@endif

<h3>Nome da Cidade</h3>
<hr>
<form method="POST" action="{{ route('parceiros.relpar') }}"
 enctype="multipart/form-data">

{{ csrf_field() }}
<div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="nome">Digite nome da cidade: </label>
        <input type="text" id="cidade" name="cidade" required class="form-control">
      </div>
    </div>
</div>

  <input type="submit" value="Consultar" class="btn btn-success">
  <input type="reset" value="Limpar" class="btn btn-warning">
</form>

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection