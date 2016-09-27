<?php
if(isset($_GET['id'])){
require_once('../clases/documento.php');
require_once('funciones.php');

$objDocumento = new Documento;
$consultaDoc = $objDocumento->mostrar($_GET['id']);
$documento = mysql_fetch_array($consultaDoc);

$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);

?>
<?php
include('header.php');
?>
<div id="info">
<p>Ruta : <a href="<?php echo $path ?>/admin">Panel Listado</a> > Secciones del documento</p>
</div>
<div id="infodoc">
	<p><strong>Documento </strong>: <?php echo $documento['titulo']?></p>
    <p><strong>Autor </strong>: <?php echo $documento['autor']?></p>
    <p><strong>Tipo </strong>: <?php echo tipodocumento($documento['tipo'])?></p>
</div>
<div id="botones">
	<span class="boton_actual">Listado</span>
	<span class="boton_enlace"><a href="nuevasecc.php?iddoc=<?php echo $documento['id']?>">Nueva seccion</a></span>
    <span class="boton_enlace"><a href="<?php echo $path ?>/admin"><img src="../img/atras.png" alt="Volver" title="Volver" /> Volver</a></span>
</div>
<div id="listado">
<?php
include('consultasec.php');
?>
</div>
</body>
</html>
<?php
}
include('footer.php');
?>