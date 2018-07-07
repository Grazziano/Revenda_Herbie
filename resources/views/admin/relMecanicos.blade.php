<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Nome:</td>
            <td>Endereço:</td>
            <td>Especialidade:</td>
            <td>Telefone:</td>
        </tr>

        @foreach($mecanicos as $c)
        <tr>
        <td>{{$c->nome}}</td>
        <td>{{$c->endereco}}</td>
        <td>{{$c->especialidade}}</td>
        <td>{{$c->telefone}}</td>
        </tr>
        @endforeach
    </table>
    {{-- @endsection --}}
</body>
</html>