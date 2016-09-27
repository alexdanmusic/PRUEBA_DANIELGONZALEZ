<?php
if(isset($_GET['id'])){
	include('calendario.php');
	require('../clases/documento.php');
	$objDocumento = new Documento;
	$consulta = $objDocumento->mostrar($_GET['id']);
	$documento = mysql_fetch_array($consulta);

	include('header.php');
	$servidor="http://".$_SERVER['SERVER_NAME'];
	$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>
<div id="info">
<p>Ruta : <a href="<?php echo $path ?>">Panel Listado</a> > Editar documento</p>
</div>
<div id="botones">
	<span class="boton_actual">Editar documento</span>
	<span class="boton_enlace"><a href="<?php echo $path ?>"><img src="../img/atras.png" alt="Volver" title="Volver" /> Volver</a></span>
</div>
<div id="listado">
<form style="width:450px;" id="frmdocumento" name="frmdocumento" method="post" action="actualizar_documento.php">
	<input type="hidden" name="id" value="<?php echo $documento['id']?>" />
  <div>
    <label for="titulo">Titulo de documento</label>
    <input type="text" name="titulo" id="titulo" maxlength="150" value="<?php echo $documento['titulo']?>" />
  </div>
  <div>
    <label for="autor">Autor/Fuente</label>
    <input type="text" name="autor" id="autor" maxlength="50" value="<?php echo $documento['autor']?>" />
  </div>
  <div>
    <label for="fecha_publicacion">Fecha Publicacion</label>
    <input readonly="readonly" type="text" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo $documento['fecha_publicacion']?>" /> <a onclick="show_calendar()" style="cursor: pointer;"><img alt="calendario" title="calendario" src="../img/calendario.png" /></a>
    <div id="calendario" style="display:none;margin-top:5px;"><?php calendar_html() ?></div>
  </div>
  <div>
    <label for="tipo">Tipo documento</label>
    <select name="tipo" id="tipo">
    	<option value="L"<?php if($documento['tipo']=="L") echo " selected=\"selected\""?>>Libro</option>
        <option value="M"<?php if($documento['tipo']=="M") echo " selected=\"selected\""?>>Manual</option>
        <option value="R"<?php if($documento['tipo']=="R") echo " selected=\"selected\""?>>Reglamento</option>
    </select>
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