// cria referencia aos elementos da pagina
var cep = document.getElementById("cep");
var endereco = document.getElementById("endereco");
var bairro = document.getElementById("bairro");
var cidade = document.getElementById("cidade");
var estado = document.getElementById("estado");

function buscarCep(){
    
    var url = "http://cep.republicavirtual.com.br/web_cep.php?cep="+cep.value+"&formato=json";

    fetch(url)
    .then((resp) => resp.json()) // Transform the data into json
    .then(function(data) {
        endereco.value = data.tipo_logradouro + " " + data.logradouro;
        bairro.value = data.bairro;
        cidade.value = data.cidade;
        estado.value = data.uf;
      })
}
// associa a um evento do elemento uma function
cep.addEventListener("blur", buscarCep);