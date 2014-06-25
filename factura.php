<?php
session_start();
	include("head.php");

	include "connect.php";
	//include "seguridad.php";
	
?>

<div class="col-md-8">
	
	<center><h1>Su factura</h1></center>
	<table class="table table-hover table-bordered">	
		<tr>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>	

		<?php

		
		$fecha=$_SESSION['fechaCompra'];
		// echo "Fecha".$fecha;

		
		$sql="SELECT  factura.id as idfactura, imagen, total, articulo.nombre as nombre_articulo, valor, cantidad, subtotal FROM factura INNER JOIN clientes ON clientes.id=factura.fk_cliente INNER JOIN detallefactura ON detallefactura.fk_ventas=factura.id  INNER JOIN articulo ON articulo.id=detallefactura.fk_articulo WHERE fecha='$fecha'";
			$query=mysqli_query($connect, $sql) or die("error".mysqli_error($connect));
			// var_dump($row);
			
			
			while ($row=mysqli_fetch_array($query)) {
					
					echo '<tr>
						<td><img src="./img/'.$row['imagen'].'" width="100px" heigth="100px" /></td>
						<td>'.$row['nombre_articulo'].'</td>
						<td>'.$row['valor'].'</td>
						<td>'.$row['cantidad'].'</td>
						<td>'.$row['subtotal'].'</td>
						

					</tr>';
			
			$total=$row['total'];
			}
			
		?>
	</table>
	</section>
	<article>
		<?php echo "<h1>Total Factura: $ ".$total."</h1>";  ?>
		<p>Su compra se ha realizado satisfactoriamente, consulte su casilla de correo para que efectue el proceso de pago y recibo de su mercancia.</p>
		<p>Tenga en cuenta que una ves efectue el pago, debe enviar el desprendible de pago por correo a la direccion tienda@gmail.com, una vez confirmado se procedera al envio de su mercancia.</p>
	</article><br>
	<a href="comprasanteriores.php?id=<?php echo $_GET['i']; ?>">Compras anteriores</a>

	<?php 
	unset($_SESSION['carrito']);
	unset($_SESSION['total']);

	
	 ?>
</div>
<?php 
	
 
 include("footer.html");


  ?>