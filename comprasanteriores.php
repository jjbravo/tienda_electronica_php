<?php

	include "connect.php";
	//include "seguridad.php";
?>
<?php include("head.php"); ?>
<div class="col-md-8">
	<center><h1>Últimas Compras</h1></center>
	<table border="1px" width="100%">	
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Subtotal</td>
		</tr>	

		<?php
		$cliente_id=$_GET['id'];
		// echo $clientes_id;
		$sql="SELECT * FROM factura INNER JOIN clientes ON clientes.id=factura.fk_cliente INNER JOIN detallefactura ON detallefactura.fk_ventas=factura.id  INNER JOIN articulo ON articulo.id=detallefactura.fk_articulo WHERE clientes.id=$cliente_id ORDER BY factura.id ASC";
			$query=mysqli_query($connect, $sql);
			// $row=mysqli_fetch_array($query);
			// var_dump($row);
			$numeroventa=0;
			while ($row=mysqli_fetch_array($query)) {
					if($numeroventa	!=$row['numeroventa']){
						echo '<tr><td>Compra Número: '.$row['numeroventa'].' </td></tr>';
					}
					$numeroventa=$f['numeroventa'];
					echo '<tr>
						<td><img src="./img/'.$row['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$row['nombre'].'</td>
						<td>'.$row['valor'].'</td>
						<td>'.$row['cantidad'].'</td>
						<td>'.$row['subtotal'].'</td>
						

					</tr>';
			}
			
		?>
	</table>
	</section>
</div>
<?php include("footer.html"); ?>