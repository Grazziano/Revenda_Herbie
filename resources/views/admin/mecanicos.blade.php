@extends('adminlte::page')

@section('title', 'Cadastro de Parceiros')

@section('content_header')
    <h1>Lista de Parceiros</h1>
@endsection

@section('content')

<table class="table table-striped">
    <tr>
      <th> Nome </th>
      <th> Endereco </th>
      <th> Especialidade </th>
      <th> Telefone </th>
      <th> Data de Cadastro </th>
    </tr>  
  @foreach($mecanicos as $c)
    <tr>
      <td> {{$c->nome}} </td>
      <td> {{$c->endereco}} </td>
      <td> {{$c->especialidade}} </td>
      <td> {{$c->telefone}} </td>
      <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
      </tr>

 
      @endforeach
    </table>
@endsection