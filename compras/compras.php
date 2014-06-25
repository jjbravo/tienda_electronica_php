<?php 

//session_name("loginUsuario");
session_start();
	include "../connect.php";
	
	if(isset($_SESSION['carrito'])){

	
	$arreglo=$_SESSION['carrito'];

		$idcliente=$_GET['i'];
		//echo 	$_GET['i'];
		
		$date = date('Y-n-j H:i:s');
		$_SESSION['fechaCompra']=$date;

		//echo $_SESSION['fechaCompra'];
		$total=$_SESSION['total'];
		$sql="INSERT INTO factura(fecha, total, fk_cliente) VALUES('$date',$total,$idcliente)";
		
		mysqli_query($connect,$sql)or die("Error ".mysqli_error($connect));
		$select="SELECT MAX(id) FROM factura WHERE fk_cliente=$idcliente AND total=".$_SESSION['total'];
		$query=mysqli_query($connect,$select)or die("Error 2 ".mysqli_error($connect));
		$row=mysqli_fetch_array($query);

	for($i=0;$i<count($arreglo);$i++){
		//var_dump($row);
		$sql="INSERT INTO detallefactura(fk_ventas,fk_articulo,cantidad,subtotal) VALUES(
			".$row[0].",
			".$arreglo[$i]['Id'].",
			".$arreglo[$i]['Cantidad'].",
			".$arreglo[$i]['Valor']*$arreglo[$i]['Cantidad'].")";
		mysqli_query($connect,$sql)or die(mysqli_error($connect));

		$sql="SELECT stock-".$arreglo[$i]['Cantidad']." FROM articulo WHERE id=".$arreglo[$i]['Id']."";
		$query=mysqli_query($connect,$sql)or die(mysqli_error($connect));
		$rows=mysqli_fetch_array($query);
		$newstock=$rows[0];

		$sql="UPDATE articulo SET stock=$newstock WHERE id=".$arreglo[$i]['Id'];
		mysqli_query($connect,$sql)or die(mysqli_error($connect));
	
	}
	// session_unset($_SESSION['carrito']);
	// session_unset($_SESSION['total']);
	// ++++++++++++++++++++++++++++++++++++++++
	// EMAIL
	$total=0;
		$tabla='<table border="1">
			<tr>
			<th>Nombre</th>
			<th>Cantidad</th>
			<th>Precio</th>
			<th>Subtotal</th>
			</tr>';
		for($i=0;$i<count($arreglo);$i++){
			$tabla=$tabla.'<tr>
				<td>'.$arreglo[$i]['Nombre'].'</td>
				<td>'.$arreglo[$i]['Cantidad'].'</td>
				<td>'.$arreglo[$i]['Valor'].'</td>
				<td>'.$arreglo[$i]['Cantidad']*$arreglo[$i]['Valor'].'</td>
				</tr>
			';
			$total=$total+($arreglo[$i]['Cantidad']*$arreglo[$i]['Valor']);
		}
		$tabla=$tabla.'</table>';
		//echo $tabla;
		$nombre="Jhon Jairo Bravo";
		$fecha=date("d-m-Y");
		$hora=date("H:i:s");
		$asunto="Compra en X dominio";
		$desde="www.tupagina.com";
		$correo="bramasterweb@gmail.com";
		$comentario='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="https://yt4.ggpht.com/-3eVnkBJn2y4/AAAAAAAAAAI/AAAAAAAAAAA/hAqolVRolHc/s48-c-k-no/photo.jpg" width="300px" heigth="250px">
				<h1>Muchas gracias por comprar en mi carrito de compras</h1>
			</center>
			<p>Hola '.$nombre.' muchas gracias por comprar aquí te mando los detalles de tu compra</p>
			<p>Lista de Artículos<br>
				'.$tabla.'
				<br>
				Total del pago es: '.$total.'

			</p>
			</div>

		';

		//echo $comentario;
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-type: text/html; charset=utf8\r\n";
		$headers.="From: Remitente\r\n";
		mail($correo,$asunto,$comentario,$headers);
		//unset($_SESSION['carrito']);
		//header("Location: ../admin.php");
		

	// ++++++++++++++++++++++++++++++++++++++++
	header("Location:../factura.php?i=$idcliente");
}else{
	
	header("Location:../carrito.php");
}
 ?>