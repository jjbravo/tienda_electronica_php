

<?php  
session_start();

include("head.php");

include("connect.php");

$sql="SELECT articulo.id as id, nombre, imagen, valor, stock FROM articulo INNER JOIN categoria ON categoria.id=articulo.fk_categoria WHERE articulo.id=".$_GET['id'];
$query=mysqli_query($connect,$sql);
$num_row=mysqli_num_rows($query);

?> 
<div class="col-md-8">
	<h1>Tienda</h1>

	
	<?php
	if($num_row>0){

		while($row=mysqli_fetch_array($query)){

			?>
			<div class="col-xs-6 col-md-6">
				
				 <a href="./detalle.php?id=<?php echo $row['id']; ?>" class="thumbnail">
	      <img src="./img/<?php echo $row['imagen'];?>" alt="...">
	    </a>
				<span style="color:	#2E70BC;"><?php echo $row['nombre']; ?> </span><br> 
				<span style="color:	#2E70BC;" ><strong>Valor </strong> $ <?php echo $row['valor']; ?></span><br>
				<span style="color:	#2E70BC;"><strong>Stock </strong><?php echo $row['stock']; ?> </span><br>

			<br>
			<?php if($row['stock']==0) {?>
 					<a disabled class="btn btn-danger btn-xs" href="./carrito.php?id=<?php echo $row['id']; ?>">No disponible</a>
					<?php }else{ ?>
 					<a class="btn btn-success btn-xs" href="./carrito.php?id=<?php echo $row['id']; ?>">Añadir al carrito</a>
					<?php } ?>
			</div>
			<?php
		}
	}else{

		echo "aun no existen articulos registrados";
	}




	?> 
</div>
<?php




include("footer.html");

?>