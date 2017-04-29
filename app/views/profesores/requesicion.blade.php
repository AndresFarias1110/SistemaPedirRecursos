<html>

    <!--
    <td><b>Bold cell</b></td>
    <td><strong>Bold cell</strong></td>
    <td><i>Italic cell</i></td>
    <td><img src="img.jpg" /></td>
    -->

    <head>
    	<meta charset="utf-8" />
    	<style type="text/css">
    		table {
    			border-collapse: collapse;
    		}
    	</style>
    </head>
    <table width="100%" border="1" style="text-align: left;">
    	<tr>
    		<th rowspan="3" style="width: 20%;">
    			<img src="<?= $urlp . '/img/tecnologicos.png' ?>">
         	</th>
    		<th style="text-align: center;">
    			Formato para  Requisición de Bienes y Servicios.
    		</th>
    		<th>
    			Código: SNEST-AD-FO-03
    		</th>
    	</tr>
    	<tr>
    		<th rowspan="2" style="text-align: center;">
    			Referencia a la norma ISO 9001:2008      7.4.2, 7.4.3
    		</th>
    		<th style="width: 20%;">
    			Revisión: O
    		</th>
    	</tr>
    	<tr>
    		<th>
    			Hoja: 1 de 1
    		</th>
    	</tr>
    </table>

    <br /><br />

    <h4 style="text-align: center; margin: 0px;">INSTITUTO TECNOLÓGICO DE MILPA ALTA</h4>
    <h4 style="text-align: center; margin: 0px 0px 20px 0px;">REQUISICIÓN DE BIENES Y SERVICIOS</h4>

    <table border="0" style="width: 100%;">
    	<tr>
    		<td>FECHA: <ins>{{ $fecha}}</ins></td>
    		<td width="200px;">FOLIO No. <ins></ins></td>
    	</tr>
    </table>

    <table border="1" style="width: 100%; margin: 0px 0px 10px 0px;">
    	<tr>
    		<td>NOMBRE Y FIRMA DEL JEFE DEL ÁREA SOLICITANTE: <strong>
    				{{ $profesor->profesion }}
    				{{ $profesor->nombre }}
    				{{ $profesor->app }}
    				{{ $profesor->apm }}
    			</strong>
    		</td>
    	</tr>
    	<tr>
    		<td>FECHA Y ÁREA SOLICITANTE: <strong>{{ $fecha_s }} {{ $depto }}</strong></td>
    	</tr>
    </table>

    <table style="width: 100%;">
	    <tr>
	    	<td>
		    	¿Los Bienes o Servicios están contemplados en el Anteproyecto del Programa Operativo Anual o en el Programa Operativo Anual?
		    </td>
		    <td>Si <inpt type="checkbox"/></td>
		    <td>No <inpt type="checkbox"/></td>
	    </tr>
    </table>

    <table width="100%" border="1">
		<tr>
			<td><h4>Clave Presupuestal</h4></td>
			<td><h4>Partida</h4></td>
			<td><h4>Cantidad</h4></td>
			<td><h4>Unidad</h4></td>
			<td><h4>Descripcion de los bienes</h4></td>
			<td><h4>Costo estimado total</h4></td>
		</tr>
		
		<?php $cont = 0 ?>
		@foreach($generales as $g)
			<?php if($cont < 25):?>
				<tr>
					<td style="width: 12%; text-align: center;">{{ $g->clave_presupuestal }}</td>
					<td style="width: 8%; text-align: center;">{{ $g->idp }}</td>
					<td style="width: 8%; text-align: center;">{{ $g->cantidad }}</td>
					<td style="width: 8%; text-align: center;">{{ $g->unidad }}</td>
					<td style="width: 50%;">{{ $g->justificacion }}</td>
					<td style="width: 10%; text-align: right;">{{ $g->presupuesto }}</td>
				</tr>
				<?php $cont ++ ?>
			<?php endif ?>
		@endforeach
		<tr>
			<td colspan="6" style="width: 100%;">
				LO ANTERIOR PARA SER UTILIZADO EN LA ACCIÓN:  {{ $accion }}
			</td>
		</tr>
		<tr>
			<td colspan="6" style="width: 100%;">
				{{ $meta }}
			</td>
		</tr>
		
	</table>
	<table width="100%" style="padding-top: 30px;">
		<tr>
			<td>
				<center>
					<strong>
						NOMBRE Y FIRMA DEL DEL<br /> SUBDIRECTOR ACADÉMICO 
					</strong>
				</center>
			</td>
			<td>
				<center>
					<strong>
						Vo. Bo.<br /> 
						JEFE DE DEPTO. DE PLANEACIÓN, PROGRAMACIÓN Y PRESUPUESTACIÓN 
					</strong>
				</center>
			</td>
			<td>
				<center>
					<strong>
						Vo. Bo.<br />
						NOMBRE Y FIRMA  DEL DIRECTOR
 
					</strong>
				</center>
			</td>
		</tr>
	</table>

	<table width="100%"  style="width:100%; padding-top: 80px;">
		<tr>
			<td style="text-align: center;">
				<ins>ING. FERNANDO CHAPA LARA</ins>
			</td>
			<td style="text-align: center;">
					<ins>ING. ERNESTO DE LA CRUZ NICOLAS</ins>
			</td>
			<td style="text-align: center;">
				<ins>ING. FERNANDO CHAPA LARA</ins>
			</td>
		</tr>
	</table>

</html>