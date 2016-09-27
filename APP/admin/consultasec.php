  <div class="cabecerasec">
      <div class="titulo1">Titulo seccion</div>
      <div class="titulo2">Acciones</div>
  </div>
<script type="text/javascript">
$(document).ready(function() {
	$(document).ready(function(){
    	$("#secciones").treeview();
  	});
});
</script>
<?php
require_once('funciones.php');
require_once('../clases/seccion.php');

echo "<ul id=\"secciones\" class=\"filetree\"> \n";
if(isset($_GET['documento_id'])){
	listar_secciones2(0,$_GET['documento_id']);
}else{
	listar_secciones2(0,$documento['id']);
}
echo "</ul> \n";
?>
  <!---->