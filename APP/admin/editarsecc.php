<?php
if(isset($_GET['idsec']) && isset($_GET['iddoc'])){
	require('../clases/seccion.php');
	$objSeccion = new Seccion;
	$consulta = $objSeccion->mostrar($_GET['idsec'],$_GET['iddoc']);
	$seccion = mysql_fetch_array($consulta);

	include('header.php');
	
	$servidor="http://".$_SERVER['SERVER_NAME'];
	$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>
<div id="info">
<p>Ruta : <a href="<?php echo $path ?>">Panel Listado</a> > <a href="<?php echo $path."/seccion.php?id=".$_GET['iddoc'] ?>">Secciones del documento</a> > Editar seccion</p>
</div>
<div id="botones">
	<span class="boton_actual">Editar seccion</span>
	<span class="boton_enlace"><a href="<?php echo $path ?>/seccion.php?id=<?php echo $_GET['iddoc'] ?>"><img src="../img/atras.png" alt="Volver" title="Volver" /> Volver</a></span>
</div>
<div id="listado">
<form id="frmseccion" name="frmseccion" method="post" action="actualizar_seccion.php">
	<input type="hidden" name="documento_id" value="<?php echo $_GET['iddoc'] ?>" />
    <input type="hidden" name="seccion_id" value="<?php echo $seccion['id'] ?>" />
  <div>
    <h3>Titulo de la seccion</h3><br />
    <input maxlength="150" style="width:99.2%;font-size:16px;padding:5px;" type="text" name="titulo" id="titulo" value="<?php echo $seccion['titulo']?>" />
  </div>
  <div>
    <h3>Escriba el contenido</h3><br />
    <textarea style="width:100%;" name="contenido" id="contenido"><?php echo htmlspecialchars($seccion['contenido'])?></textarea>
  </div>
  <div id="fm-submit">
    <input type="submit" name="submit" id="button" value="Guardar" />
  </div>
</form>
</div>
<?php
include('footer.php');
}
?>