<?php
require_once(dirname(dirname(__FILE__)).'/clases/documento.php');
require_once('funciones.php');

$ojbDocumento = new Documento;
$total_registro = $ojbDocumento->total();
$reg_mostrar = 10;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$reg_inicio=($_GET['pag']-1)*$reg_mostrar;
	$consulta = $ojbDocumento->listado($reg_inicio,$reg_mostrar);
	$pag_act=$_GET['pag'];
}else{
  	$reg_inicio=0;
	$consulta = $ojbDocumento->listado();
  	$pag_act=1;
}


?>
  <table border="0" cellspacing="0" cellpadding="0">
  	<tr>
      <th>Titulo</th>
      <th>Autor</th>
      <th>Fecha Pub</th>
      <th>Tipo</th>
      <th colspan="3">Acciones</th>
    <tr>
    <tr>
<?php
if($consulta){
	while($documento = mysql_fetch_array($consulta)){
?>
    <tr>
      <td><?php echo $documento['titulo']?></td>
      <td><?php echo $documento['autor']?></td>
      <td><?php echo $documento['fecha_publicacion']?></td>
      <td width="90px"><?php echo tipodocumento($documento['tipo'])?></td>
      <td width="80px"><a href="seccion.php?id=<?php echo $documento['id']?>"><img src="../img/secciones.png" title="Ver secciones" alt="Secciones" /> Secciones</a></td>
      <td width="50px"><a href="editar.php?id=<?php echo $documento['id']?>"><img src="../img/editar.png" title="Editar" alt="Editar" /> Editar</a></td>
      <td width="65px"><a onClick="EliminarDocumento(<?php echo $documento['id'] ?>); return false" href="eliminar.php?id=<?php echo $documento['id']?>"><img src="../img/eliminar.png" title="Eliminar" alt="Eliminar" /> Eliminar</a></td>
    </tr>
<?php
	}
}
?>
  </table>
<?php

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
 echo "<strong> Pagina ".$pag_act." de ".$pag_ult ." </strong>";
 echo "<a href=\"./\" onclick=\"ListarDocumento('1'); return false\"><img src=\"../img/first.png\" title=\"Primera pagina\" /></a> ";
 if($pag_act>1) {
	 echo "<a href=\"?pag=".$pag_ant."\" onclick=\"ListarDocumento('$pag_ant'); return false\"><img src=\"../img/previous.png\" title=\"Anterior pagina\" /></a> ";
 }else{
	 echo "<img src=\"../img/previous.png\" title=\"Anterior pagina\" /> ";
 }
 if($pag_act<$pag_ult) {
	 echo "<a href=\"?pag=".$pag_sig."\" onclick=\"ListarDocumento('$pag_sig'); return false\"><img src=\"../img/next.png\" title=\"Siguiente pagina\" /></a> ";
 }else{
	 echo "<img src=\"../img/next.png\" title=\"Siguiente pagina\" /> ";
 }
 echo "<a href=\"?pag=". $pag_ult."\" onclick=\"ListarDocumento('$pag_ult'); return false\"><img src=\"../img/last.png\" title=\"Ultima pagina\" /></a>";
?>
</div>