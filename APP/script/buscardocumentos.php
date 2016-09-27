<script type="text/javascript">
$(document).ready(function() {
	$(".documentitem a").click(function(){
		$("#list_subtemas").html('');
		
		//obtenemos id del documento oculto
		var document_id = $(this).attr('id');
		
		//obtenemos valores por ajax
		$.ajax({
			type: "GET",
			url: 'script/listarsecciones.php?id='+document_id,
			success: function(datos){
				$("#list_subtemas").html(datos);
				$("#cont_subtemas").show();
			}
		});
		
		//codigo del documento a un campo oculto
		$("#codigo_sec").val(document_id);
	});
	
	//seleccionar item documentos
	$(".documentitem a").click(function(){
		$(".documentitem a").css('font-weight','normal');
		$(this).css('font-weight','bold');
	});
});
</script>
<?php
require_once(dirname(dirname(__FILE__)).'/clases/documento.php');
$ojbDocumento = new Documento;
$reg_mostrar = 10;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$reg_inicio=($_GET['pag']-1)*$reg_mostrar;
	$pag_act=$_GET['pag'];
}else{
  	$reg_inicio=0;
  	$pag_act=1;
}

//determinar que tipo de documento se va mostrar
if(isset($_GET['libro'])){
	$consultaDocs = $ojbDocumento->busqueda($_GET['dato'],'l',$reg_inicio,$reg_mostrar);
	$total_registro = $ojbDocumento->total_busqueda($_GET['dato'],'l');
	$tipo="libro";
}

if(isset($_GET['reglamento'])){
	$consultaDocs = $ojbDocumento->busqueda($_GET['dato'],'r',$reg_inicio,$reg_mostrar);
	$total_registro = $ojbDocumento->total_busqueda($_GET['dato'],'r');
	$tipo="reglamento";
}

if(isset($_GET['manual'])){
	$consultaDocs = $ojbDocumento->busqueda($_GET['dato'],'m',$reg_inicio,$reg_mostrar);
	$total_registro = $ojbDocumento->total_busqueda($_GET['dato'],'m');
	$tipo="manual";
}

echo "<ul>";
while ($row = mysql_fetch_array($consultaDocs)){
	echo "<li class=\"documentitem\"> <a id=\"".$row['id']."\" href=\"#\">".$row['titulo']."</a></li> \n";
}
echo "</ul>";

if($total_registro>10){
//determinar numero de paginas
 $pag_ant=$pag_act-1;
 $pag_sig=$pag_act+1;
 $pag_ult=$total_registro/$reg_mostrar;
 $residuo=$total_registro%$reg_mostrar;
 if($residuo>0) $pag_ult=floor($pag_ult)+1;
 
 //navegacion
?>
<div id="paginacion">
<?php
// echo "<strong> Pagina ".$pag_act." de ".$pag_ult ." </strong>";
 echo "<a href=\"#\" onclick=\"buscarDocs('".$tipo."','1'); return false\"><img src=\"../img/first.png\" title=\"Primera pagina\" /></a> ";
 if($pag_act>1) {
	 echo "<a href=\"#\" onclick=\"buscarDocs('".$tipo."','$pag_ant'); return false\"><img src=\"../img/previous.png\" title=\"Anterior pagina\" /></a> ";
 }else{
	 echo "<img src=\"../img/previous.png\" title=\"Anterior pagina\" /> ";
 }
 if($pag_act<$pag_ult) {
	 echo "<a href=\"#\" onclick=\"buscarDocs('".$tipo."','$pag_sig'); return false\"><img src=\"../img/next.png\" title=\"Siguiente pagina\" /></a> ";
 }else{
	 echo "<img src=\"../img/next.png\" title=\"Siguiente pagina\" /> ";
 }
 echo "<a href=\"#\" onclick=\"buscarDocs('".$tipo."','$pag_ult'); return false\"><img src=\"../img/last.png\" title=\"Ultima pagina\" /></a>";
}
?>
</div>