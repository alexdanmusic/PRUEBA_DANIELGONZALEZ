<?php
include('header.php');
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>

<div id="info">
<p>Ruta : <a href="<?php echo $path ?>">Panel Listado</a> > <a href="<?php echo $path."/seccion.php?id=".$_GET['iddoc'] ?>">Secciones del documento</a> > Nueva seccion</p>
</div>
<div id="botones">
	<span class="boton_actual">Nueva seccion</span>
	<span class="boton_enlace"><a href="seccion.php?id=<?php echo $_GET['iddoc'] ?>"><img src="../img/atras.png" alt="Volver" title="Volver" /> Volver</a></span>
</div>
<div id="listado">
<form id="frmseccion" name="frmseccion" method="post" action="guardar_seccion.php">
	<input type="hidden" name="documento_id" value="<?php echo $_GET['iddoc'] ?>" />
    <?php 
	if(isset($_GET['nodo'])){?>
	<input type="hidden" name="nodo" value="<?php echo $_GET['nodo'] ?>" />
    <?php
	}else{
	?>
    <input type="hidden" name="nodo" value="0" />
    <?php
	}
	if(isset($_GET['idsec'])){?>
	<input type="hidden" name="idsec" value="<?php echo $_GET['idsec'] ?>" />
    <?php
	}else{
	?>
    <input type="hidden" name="idsec" value="0" />
    <?php
	}
	?>
  <div>
    <h3>Titulo de la seccion</h3><br />
    <input maxlength="150" style="width:99.2%;font-size:16px;padding:5px;" type="text" name="titulo" id="titulo" />
  </div>
  <div>
  	<h3>Escriba el contenido</h3><br />
    <textarea style="width:100%;" name="contenido" id="contenido"></textarea>
  </div>
  <div id="fm-submit">
    <input type="submit" name="submit" id="button" value="Guardar" />
  </div>
</form>
</div>
<?php
include('footer.php');
?>