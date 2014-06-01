$(document).ready(function(){
	ajaxload('homedash.php');
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