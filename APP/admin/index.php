<?php
include('header.php');
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>
<div id="info">
<p>Ruta : <a href="<?php echo $path ?>">Panel Listado</a></p>
</div>
<div id="botones">
	<span class="boton_actual">Listado</span>
	<span class="boton_enlace"><a href="nuevo.php">Nuevo documento</a></span>
</div>
<div id="listado">
	<div id="busqueda">
      <form id="form1" name="form1" action="">
      	<div>
        <input style="font-size:14px;padding:5px;" type="text" name="campobusqueda" id="campobusqueda" />
        <span id="fm-submit"><input style="width:100px;" type="button" name="button" id="button" value="Buscar" onclick="Buscar()" /></span>
        </div>
      </form>
	</div>
    <div id="list-ajax">
    <?php
	include('consultadoc.php');
	?>
  	</div>
</div>
<?php
include('footer.php');
?>