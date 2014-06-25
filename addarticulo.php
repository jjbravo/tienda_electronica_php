<?php
	
	include "seguridad.php";




	$LINK="<li><a href='admin.php'>Admin</a></li>
	<li><a href='addarticulo.php'>Nuevo producto</a></li>
	<li><a href='actualizar.php'>Actualizar</a></li>
	";

 	include("head.php"); 

 	include "connect.php";

 ?>
<div class="col-md-8">
	<?php 
		$sql="SELECT * FROM categoria";
		$query=mysqli_query($connect,$sql);

	 ?>
	<center><h1>Agregar nuevo producto</h1></center>
	<form action="addArticulo.php" method="post" enctype="multipart/form-data">
		<label for="nombre">Nombre</label>
		<input id="nombre" type="text" name="nombre"> <br>
		<label for="descripcion">Descripcion</label>
		<input id="descripcion" type="text" name="descripcion"> <br>	
		<label for="imagen">Imagen</label>
		<input id="imagen" type="file" name="file"><br>
		<label for="valor">Valor</label>
		<input id="valor" type="text" name="valor"><br>
		<label for="stock">Stock</label>
		<input id="stock" type="text" name="stock"><br>
		<label for="categoria">Categoria</label>
		<select name="fk_categoria" id="categoria">
			<option value="--">--</option>
			<?php 

			while ($row=mysqli_fetch_array($query)) {
				echo "<option value='".$row[0]."'>".$row[1]."</option>";
			}

			 ?>

		</select>
		<br>

		<input type="submit" value="Guardar">

	</form>
	
</div>
<?php  include("footer.html"); ?>