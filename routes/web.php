<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::resource('carros', 'CarroController');
   Route::resource('usuarios', 'UserController');
   Route::get('carrosgraf', 'CarroController@graf')
   ->name('carros.graf');
   Route::get('carrosdestaque/{id}', 'CarroController@destaque')
   ->name('carros.destaque');
   Route::resource('clientes', 'UUserController');
   Route::get('cadcli', 'ClinteController@form')
   ->name('cad.cli');

   Route::resource('mecanicos','mecanicoController');
   Route::post('mecPesquisa', 'mecanicoController@pesquisarMecanico')->name('mecanico.pesq');
   Route::get('pesquisarMecanico', 'mecanicoController@create');
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('site', 'ListaController');

Route::resource('proposta', 'PropostaController');

Route::get('admin/propostas', 'PropostaController@index');

Route::post('carrosfiltroscom', 'CarroComercialController@filtros')->name('carros.filtroscom');

// aqui seleciono a proposta
Route::get('admin/resposta{id}', 'PropostaController@responder')->name('propostas.resposta');

Route::post('admin/resposta', 'PropostaController@enviaEmail')->name('resposta');

Route::resource('admin/marcas', 'MarcaController');

Route::get('admin/propostagraf', 'PropostaController@graf')->name('proposta.graf');

Route::get('/wscarro/{id?}', 'wsController@wsCarro');

Route::get('/wsxml/{id?}', 'wsController@wsxml');

Route::get('/listaxml/{preco?}', 'wsController@listaxml');

// imprime o pdf de teste em localhost:8000/rel
Route::get('/rel', function() {
$pdf = App::make('dompdf.wrapper');
$pdf->loadHTML('<h1>Test</h1>');
return $pdf->stream();
});

// aqui é parte do trabalho final
Route::get('/relcarros', 'relatController@relcarros');
Route::get('/relparceiros', 'relatController@relparceiros');

// rotas finais 
Route::resource('admin/parceiros', 'ParceirosController');
Route::get('/json/{id?}', 'ParceirosController@json');
Route::get('/xml/{id?}', 'ParceirosController@xml');

// lista de nomes
Route::get('/lista/{cidade?}', 'ParceirosController@lista');

// relatorios em pdf
Route::get('/relparceiros','ParceirosController@relParceiros');
Route::post('/relpar{cidade?}','ParceirosController@relpar')->name('parceiros.relpar');

// geração do pdf como filtro
Route::get('admin/consulta', 'ParceirosController@consulta');


Route::get('/mecId/{id?}', 'mecController@mecId');

Route::get('/listarMecanicos/{palavra?}', 'mecController@listarMecanicos');


// Route::get('admin/reservagraf', 'ReservasController@graf')->name('reserva.graf');

Route::get('reserva', function () {
    return view('reserva');
   });