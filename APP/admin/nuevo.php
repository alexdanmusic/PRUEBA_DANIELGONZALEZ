<?php
include('header.php');
include('calendario.php');
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>
<div id="info">
<p>Ruta : <a href="<?php echo $path ?>">Panel Listado</a> > Nuevo documento</p>
</div>
<div id="botones">
	<span class="boton_actual">Nuevo documento</span>
	<span class="boton_enlace"><a href="<?php echo $path ?>"><img src="../img/atras.png" alt="Volver" title="Volver" /> Volver</a></span>
</div>
<div id="listado">
<form style="width:450px;" id="frmdocumento" name="frmdocumento" method="post" action="guardar_documento.php">
  <div>
    <label for="titulo">Titulo de documento</label>
    <input type="text" name="titulo" id="titulo" maxlength="150" />
  </div>
  <div>
    <label for="autor">Autor/Fuente</label>
    <input type="text" name="autor" id="autor" maxlength="50" />
  </div>
  <div>
    <label for="fecha_publicacion">Fecha Publicacion </label>
    <input readonly="readonly" type="text" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo date("Y-m-j")?>" /> <a onclick="show_calendar()" style="cursor: pointer;"><img alt="calendario" title="calendario" src="../img/calendario.png" /></a>
    <div id="calendario" style="display:none;margin-top:5px;"><?php calendar_html() ?></div>
  </div>
  <div>
    <label for="tipo">Tipo documento</label>
    <select name="tipo" id="tipo">
    	<option value="L">Libro</option>
        <option value="M">Manual</option>
        <option value="R">Reglamento</option>
    </select>
  </div>  
  <div id="fm-submit">
    <input type="submit" name="submit" id="button" value="Guardar" />
  </div>
</form>
</div>
<?php
include('footer.php');
?>