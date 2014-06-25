

<?php  
//session_name("loginUsuario");

session_start();
if(isset($_SESSION['Entrada'])){
	$LOG="<li><a href='salir.php'>Salir</a>";
}else{
	$LOG="<li><a href='login.php'>Entrar</a>";

}
$entrada=$_SESSION['Entrada'];
$USER="<a href='#'>".$entrada['User']."</a>";
include("head.php");

include("connect.php");

if(isset($_SESSION['carrito'])){
	if(isset($_GET['id'])){

		$arreglo=$_SESSION['carrito'];
		$encontrado=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['Id']==$_GET['id']){
				$encontrado=true;
				$numero=$i;
			}
		}
		if($encontrado==true){
			$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			$_SESSION['carrito']=$arreglo;
		}else{
			$nombre="";
			$valor=0;
			$imagen="";
			$stock=0;

			$sql="SELECT articulo.id as id, nombre, imagen, valor, stock FROM articulo INNER JOIN categoria ON categoria.id=articulo.fk_categoria WHERE articulo.id=".$_GET['id'];
			$query=mysqli_query($connect,$sql);
			//$num_row=mysqli_num_rows($query);
			while ($row=mysqli_fetch_array($query)) {
					$nombre=$row['nombre'];
					$valor=$row['valor'];
					$imagen=$row['imagen'];
					$stock=$row['stock'];

				}
				$datosNuevos=array('Id'=>$_GET['id'],
									'Nombre'=>$nombre,
									'Valor'=>$valor,
									'Imagen'=>$imagen,
									'Stock'=>$stock,
									'Cantidad'=>1);

				array_push($arreglo, $datosNuevos);
				$_SESSION['carrito']=$arreglo;
		}
		header("Location:carrito.php");
	}

}else{
	
	if(isset($_GET['id'])){

	
		$nombre="";
		$valor=0;
		$imagen="";

	$sql="SELECT articulo.id as id, nombre, imagen, valor, stock FROM articulo INNER JOIN categoria ON categoria.id=articulo.fk_categoria WHERE articulo.id=".$_GET['id'];
	$query=mysqli_query($connect,$sql);
	//$num_row=mysqli_num_rows($query);
	while ($row=mysqli_fetch_array($query)) {
			$nombre=$row['nombre'];
			$valor=$row['valor'];
			$imagen=$row['imagen'];
			$stock=$row['stock'];
			
		}
		$arreglo[] = array('Id'=>$_GET['id'],
			'Nombre'=>$nombre,
			'Valor'=>$valor,
			'Imagen'=>$imagen,
			'Stock'=>$stock,
			'Cantidad'=>1);

		$_SESSION['carrito']=$arreglo;
	
		 header("Location:carrito.php");
	}
}

?> 
<div class="col-md-8">
	<h1>Carrito</h1>
<br>
	
	<?php
		$total=0;
	if(isset($_SESSION['carrito'])){
		$datos=$_SESSION['carrito'];
		for($i=0;$i<count($datos);$i++){
			?>
			<div class="col-xs-6 col-md-3 producto">
				<div class="thumbnail">
				<a href="#" class="thumbnail" ><img src="./img/<?php echo $datos[$i]['Imagen'];?>" ></a><br>
				  <div class="caption">
				<span><?php echo $datos[$i]['Nombre']; ?> 	 </span><br>
				<span>Precio: <?php echo $datos[$i]['Valor']; ?> </span><br>
				<span>Stock: <?php echo $datos[$i]['Stock']; ?> </span><br>
				<span>Cantidad: 
					<select data-precio="<?php echo $datos[$i]['Valor']; ?>" 
						data-id=<?php echo $datos[$i]['Id']; ?>
						class="cantidad">
						<?php 
						echo "<option value=''>".$datos[$i]['Cantidad']."</option>"; 
						echo "<option value=''>--</option>"; 
						$val=$datos[$i]['Stock'];

						for($a=0;$a<=$val;$a++) {

							echo "<option value='".$a."'>".$a."</option>"; 
							
						}
						?>
						
					</select>
				<br>
				<span class="subtotal">Subtotal <?php echo $datos[$i]['Cantidad']*$datos[$i]['Valor']; ?> </span><br>
       
        
        <p><a href="#" class="btn btn-xs btn-danger eliminar" data-id="<?php  echo $datos[$i]['Id']; ?>" role="button">Eliminar</a></p>
      </div>
			</div>
			</div>
			<?php
			$total=($datos[$i]['Cantidad']*$datos[$i]['Valor'])+$total;
			$_SESSION['total']=$total;
		}
	}else{
		echo "<h3>El carrito esta vacio</h3>";
	}
	//echo "<strong><h2 id='total'> Total: ".$total."</h2></strong> ";
	
	?> 

</div>
<?php




include("footer.html");

?>