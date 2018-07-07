<h1>Revenda Herbie</h1>
<h2>Relatório de Parceiros Cadastrados</h2>

<table border=1>
    <tr><td>Nome</td>
    <td>Marca</td>
    <td>Cidade</td>
    <td>Telefone</td>
    </tr>

    @foreach($parceiros as $p)
        <tr><td>{{$p->nome}}</td>
        <td>{{$p->marca}}</td>
        <td>{{$p->cidade}}</td>
        <td>{{$p->fone}}</td>
        </tr>
    @endforeach
</table>