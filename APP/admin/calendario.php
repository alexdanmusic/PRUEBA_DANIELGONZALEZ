<?php
function ultimoDia($mes,$ano){
    $ultimo_dia=28;
	//checkdate => Valida fecha
    while (checkdate($mes,$ultimo_dia + 1,$ano)){
       $ultimo_dia++;
    }
    return $ultimo_dia;
	
} 

function calendar_html(){
	$meses= array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	$mes=date('m',time()); //mes actual
	$anio=date('Y',time()); //año actual
	?>
    <span style="margin:0px;">
	<table style="width:250px;text-align:center;" cellpadding="0" cellspacing="0">
	 <tr>
	  <td colspan="4">
	  	<select id="calendar_mes" onchange="update_calendar()">
		 <?php
		 //seleccion el mes actual
		 $mes_numero=1;
		 while($mes_numero<=12){
		 	if($mes_numero==$mes) echo "<option value=".$mes_numero." selected=\"selected\">".$meses[$mes_numero-1]."</option> \n";
			else echo "<option value=".$mes_numero.">".$meses[$mes_numero-1]."</option> \n";
			$mes_numero++;
		 }
		 ?>
		</select>
	  </td>
	  <td colspan="3">
	  	<select style="width:70px;" id="calendar_anio" onchange="update_calendar()">
		 <?php
		 // selecciona el año actual
		 $anio_min=$anio-30; //mostrara 30 años
		 $anio_max=$anio; //año actual
		 while($anio_min<=$anio_max){
			 if($anio_min == $anio_max) echo "<option value=".$anio_min." selected=\"selected\">".$anio_min."</option> \n";
			 else echo "<option value=".$anio_min.">".$anio_min."</option> \n";
			$anio_min++;
		 }
		 ?>
		</select>
	  </td>
	 </tr>
     </table>
    </span>
	<span id="calendario_dias">
	<?php calendar($mes,$anio) ?>
	</span>
    
	<?php
}

function calendar($mes,$anio){
	$dia=1;
	if(strlen($mes)==1) $mes='0'.$mes;
	?>
    <table style="width:250px;text-align:center;" cellpadding="0" cellspacing="0">
	 <tr style="background-color:#CCCCCC;">
	  <td>D</td>
	  <td>L</td>
	  <td>M</td>
	  <td>M</td>
	  <td>J</td>
	  <td>V</td>
	  <td>S</td>
	 </tr>
	<?php
	//echo $mes.$dia.$anio;
	$numero_primer_dia = date('w', mktime(0,0,0,$mes,$dia,$anio));
	$ultimo_dia=ultimoDia($mes,$anio);
	$total_dias=$numero_primer_dia+$ultimo_dia+1; //update:sumamos unidad por que numero_primer_dia empieza en 0
	$diames=1;
	$hoy=date("j");
	$meshoy=date("m");
	$aniohoy=date("Y");
	//$j dias totales (dias que empieza a contarse el 1º + los dias del mes)
	$j=1;
	while($j<$total_dias){
		echo "<tr> \n";
		//$i contador dias por semana
		$i=0;
		while($i<7){
			if($j<=$numero_primer_dia){
				echo " <td></td> \n";
			}elseif($diames>$ultimo_dia){
				echo " <td></td> \n";
			}else{
				if($diames<10) $diames_con_cero='0'.$diames;
				else $diames_con_cero=$diames;
					if($diames==$hoy && $mes==$meshoy && $anio==$aniohoy) echo " <td><a style=\"display:block;cursor:pointer;\" onclick=\"set_date('".$anio."-".$mes."-".$diames_con_cero."')\"><strong style=\"color:red;\">".$diames."</strong></a></td> \n";
					else echo " <td><a style=\"display:block;cursor:pointer;\" onclick=\"set_date('".$anio."-".$mes."-".$diames_con_cero."')\">".$diames."</a></td> \n";
				$diames++;
			}
			$i++;
			$j++;
		}
		echo "</tr> \n";
	}
	?>
    </table>
    <?php
}
?>