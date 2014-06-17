$(document).ready(function(){
	ajaxload('homedash.php');
	$("#search").keyup(function(event){
	    if(event.keyCode == 13){
	    	var valor = $("#search").val();
	        ajaxload('search.php?search="valor"');
	    }
	});
});


/* Requsito PWII
 * Desenvolvido pelo Grupo Suricaso
 */
var ajax;
function CriaObjetoAjax(){ 
	var ajax=null; 
  try   {  // Opera 8.0+, Firefox, Safari 
  	ajax=new XMLHttpRequest(); 
  } 
  catch (e) { // Internet Explorer Browsers 
  	try {  
  		ajax=new ActiveXObject("Msxml2.XMLHTTP"); 
  	} 
  	catch (e){ 
  		ajax=new ActiveXObject("Microsoft.XMLHTTP"); 
  	} 
  } 
  return ajax; 
} 

function monitoraEstado() {  
	if (ajax.readyState==4 || ajax.readyState=="complete") {  
		document.getElementById("page").innerHTML=ajax.responseText;  
	}  
} 
var pagAtual;
function ajaxload(pagina){ 
	pagAtual = pagina;
	ajax=CriaObjetoAjax(); 
	if (ajax==null) { 
		alert ("Este navegador não suporta Ajax"); 
		return; 
	} 
	var url = pagina;
	ajax.onreadystatechange=monitoraEstado;  
	ajax.open("GET", url, true); 
	ajax.send(null); 
}

function salvaForm() {
	var dados = $('#novo_artigo').serialize();
	if ($('#artigo').val() == "") {
		alert('Preencha todos os campos');
		return false;
	}
	

	$.ajax({
		type: "POST",
		url: "novo_post.php",
		data: dados,
		success: function( data ) {
			alert('Artigo publicado com sucesso!');
			ajaxload(pagAtual);
		},
		error: function(xhr, error){
		    console.debug(xhr); 
		    console.debug(error);
		}
	});
		
	return false;
}

function atualizacadastro() {
	var dados = $('#cadastro').serialize();	

	$.ajax({
		type: "POST",
		url: "profile.php",
		data: dados,
		success: function( data ) {
			alert('Cadastro atualizado com sucesso!');
			ajaxload(pagAtual);
		},
		error: function(xhr, error){
		    console.debug(xhr); 
		    console.debug(error);
		}
	});
		
	return false;
}

function atualizasenha() {
	var dados = $('#mudarsenha').serialize();
	if ($("#senha").val() == $("#resenha").val()) {
		if ($("#senha").val() != "" && $("#resenha").val() != "") {
			$.ajax({
				type: "POST",
				url: "mudarsenha.php",
				data: dados,
				success: function( data ) {
					alert('Senha atualizada com sucesso!');
					ajaxload(pagAtual);
				},
				error: function(xhr, error){
				    console.debug(xhr); 
				    console.debug(error);
				}
			});
				
			return false;
		} else {
			alert("Senhas em branco");
		}
	} else {
		alert("Senhas incompatíveis");
	}
}

function busca() {
	var dados = $('#busca').serialize();
	if ($("#busca").val() != "") {
		$.ajax({
			type: "GET",
			url: "search.php",
			data: dados,
			success: function( data ) {

			},
			error: function(xhr, error){
			    console.debug(xhr); 
			    console.debug(error);
			}
		});
			
		return false;
	} else {
		alert("Senhas incompatíveis");
	}
}