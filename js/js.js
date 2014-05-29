$(document).ready(function(){
	ajaxload('homedash.php');
});
function ajaxload(pagina) {
	$("#page").load(pagina);
}