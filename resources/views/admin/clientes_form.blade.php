@extends('adminlte::page')

@section('title', 'Cadastro de Clientes')

@section('content_header')

@if ($acao==1)
<h2>Inclusão de Clientes
@else ($acao ==2)
<h2>Alteração de Clientes
@endif          

  <a href="{{ route('carros.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($acao==1)
<form method="POST" action="{{ route('carros.store') }}"
 enctype="multipart/form-data">
@else ($acao==2)
<form method="POST" action="{{route('carros.update', $reg->id)}}"
 enctype="multipart/form-data">
{!! method_field('put') !!}
@endif          
{{ csrf_field() }}

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="nome">Nome do Cliente</label>
        <input type="text" id="nome" name="nome" required class="form-control">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" required class="form-control">
      </div>
    </div>
  </div>              

  <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="cep">Cep</label>
          <input type="text" id="cep" name="cep" required class="form-control">
        </div>
      </div>
    
      <div class="col-sm-6">
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" required class="form-control">
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input type="text" id="bairro" name="bairro" required class="form-control">
        </div>
      </div>

      <div class="col-sm-5">
        <div class="form-group">
          <label for="cidade">Cidade</label>
          <input type="text" id="cidade" name="text" required class="form-control">
        </div>
      </div>
    
      <div class="col-sm-2">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" required class="form-control">
          </div>
      </div>
  </div>

  <input type="submit" value="Enviar" class="btn btn-success">
  <input type="reset" value="Limpar" class="btn btn-warning">
</form>

@endsection

@section('js')
<script src="/js/buscacep.js"></script>
@endsection