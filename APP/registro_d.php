<html>
<head>
<title> Desayuno </title>

</head>
		<body>
			
			
			<center><h1>&nbsp;</h1><center>
			
			<center>
            <DIV  STYLE="position: absolute; top: 128px; left: 453px; width: 432px; height: 42px; visibility:visible z-index:1; color: #99CCCC; font-weight: bold; font-size: 36px; text-align: center;">
			  <table width="234" height="76" border="1">
			    <tr>
			      <td width="224" height="72"><p>- Registro de documentos</p>
		          <p>- Todos los campos requeridos</p></td>
		        </tr>
		      </table>
              </DIV>
	    <h3>&nbsp;</h3></center>
			<center><form method="POST" action=""/>
            
            <DIV  STYLE="position: absolute; top: 265px; left: 425px; width: 432px; height: 42px; visibility:visible z-index:1; color: #000000;">
				<table>
					<tr>
						<td>
							ID:
						</td>
						<td>
							<input type="name" name="id" />
						</td>
					</tr>
					<tr>
						<td>
							TITULO:
						</td>
						<td>
							<input type="name" name="titulo" />
						</td>
					</tr>
					<tr>
						<td>
							AUTOR:
						</td>
						<td>
							<input type="name" name="autor" />
						</td>
					</tr>
					<tr>
						<td>
							FECHA DE PUBLICACION:
						</td>
						<td>
							<input type="name" name="fecha" />
						</td>
					</tr>
						<tr>
						<td>
							TIPO:
						</td>
						<td>
							<input type="name" name="tipo" />
						</td>
					</tr>
						<tr>
						
						
					</tr>
					
				</table>
				<input type="submit" name="submit" value="Registrar Documento" />
				<a href="index.php?manual">
				<input type="reset" value="Limpiar Formulario"   />
				INICIO
            </a></div>
				<br>
				<br>
				<br>
				<br> 
				
			<?php
				if (isset($_POST['submit'])){
					require("registro.php");
				}
			?>
		
		</body>
		
</html>