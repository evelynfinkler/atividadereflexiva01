/**
 * Funcoes para acesso AJAX/PHP
 */
/** 
  * Funcao para carregar a tela de login
*/
function criarbd() {
	$.ajax({
		url: './php/montarbd.php',
		type: 'POST', 
		data: '', 
		dataType: 'text', 
		success: function(retorno) {
			$("#tmsg").html(retorno);
		}
	})
}

function fichadados() {
	$.ajax({
		url: './fichadados.html',
		type: 'GET',
		data: '', 
		dataType: 'html', 
		success: function(retorno) {
			$("#ttrabalho").html(retorno);
		}
	})
}

function escolaridadevisivel() {
	$(".invisivel").show();
}

function pessoalvisivel() {
	$(".invisivel1").show();
}

function profvisivel() {
	$(".invisivel2").show();
}

function gravarcurriculo() {
	$.ajax({
		url: './php/gravarcurriculo.php', 
		type: 'GET',
		data: 'Nome=' + $("#fnome").val() + '&Nascimento=' + $("#fnascimento").val() +
		      '&Sexo=' + $("#fsexo").val() + '&Ender=' + $("#fendereco").val() +
		      '&Numero=' + $("#fnumero").val() + '&Bairro=' + $("#fbairro").val() +
		      '&Cidade=' + $("#fcidade").val() + '&UF=' + $("#fuf").val() +
		      '&CPF=' + $("#fcpf").val() + "&Fone=" + $("#ftelefone").val() +
		      '&EMail=' + $("#femail").val() + '&Esco=' + $("#fescolaridade").val() +
		      '&Pessoal=' + $("#frefpessoal").val() + '&Prof=' + $("#frefprofissional").val(),
	    dataType: 'text',
	    success: function (retorno) {
	    	$("#tmsg").html(retorno);
	    	if(retorno.indexOf("Erro:") == -1) {
		    	$("#fcadastro").trigger("reset");
	    	}
	    }
	})
}

