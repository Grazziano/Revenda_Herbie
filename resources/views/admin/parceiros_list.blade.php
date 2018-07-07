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

<table class="table table-striped">
  <tr>
    <th> Nome </th>
    <th> Marca </th>
    <th> Cidade </th>
    <th> Fone </th>
    <th> Ações </th>
  </tr>  
@foreach($parceiros as $p)
  <tr>
    <td> {{$p->nome}} </td>
    <td> {{$p->marca}} </td>
    <td> {{$p->cidade}} </td>
    <td> {{$p->fone}} </td>
    <td> 
    
        <form style="display: inline-block"
              method="post"
              action="{{route('parceiros.destroy', $p->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>  &nbsp;&nbsp;
        
    </td>
  </tr>
  
@endforeach
</table>
{{ $parceiros->links() }}
@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection