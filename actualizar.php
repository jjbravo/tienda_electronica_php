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
	<center><h1>Actualizar</h1></center>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Icon</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Valor</th>
				<th>Stock</th>
				<th>Deshabilitar</th>
				<th>Actualizar</th>

			
			</tr>
		</thead>
		<tbody>
			<?php 
				$sql="SELECT * FROM articulo WHERE estado='Disponible'";
				$query=mysqli_query($connect,$sql)or die("Error".mysqli_error($connect));

				while($row=mysqli_fetch_array($query)){
					echo "
						<tr>
					<td><input type='hidden' value='".$row[0]."'>".$row[0]."<input type='hidden' class='imagen' value='".$row[3]."'></td>
							<td><img  style='width:40px; height:40px;' src='./img/".$row[3]."' ></td>
							<td><input type='text' class='nombre' value='".$row[1]."' ></td>
							<td><input type='text' class='descripcion' value='".$row[2]."' ></td>
							<td><input type='text' size='8' class='valor' value='".$row[4]."' ></td>
							<td><input type='text' size='2' class='stock' value='".$row[5]."' ></td>
							<td><button class='hab_des btn-danger btn-xs' data-id='".$row[0]."' >Deshabilidar</button></td>
							<td><button class='actualizar btn-success btn-xs' data-id='".$row[0]."' >Actualizar</button></td>
							
						</tr>
					";
				}
			 ?>
		</tbody>
	</table>
	
	<script>

$(function(){
			$(".hab_des").click(function(){
				$(this).parent('td').parent('tr').remove();
				var imagen=$(this).parent('td').parent('tr').find('.imagen').val();
				$.post(
						'./ejecuta.php',{
							Caso:'Eliminar',
							Id:$(this).attr('data-id'),
							Imagen:imagen
						},function(e){
							alert(e);
						}
					);

			});

			$(".actualizar").click(function(){
				
				var nombre=$(this).parent('td').parent('tr').find('.nombre').val();
				var descripcion=$(this).parent('td').parent('tr').find('.descripcion').val();
				var valor=$(this).parent('td').parent('tr').find('.valor').val();
				var stock=$(this).parent('td').parent('tr').find('.stock').val();
				$.post(
						'./ejecuta.php',{
							Caso:'Actualizar',
							Id:$(this).attr('data-id'),
							Nombre:nombre,
							Descripcion:descripcion,
							Valor:valor,
							Stock:stock
						},function(e){
							alert(e);

						}
					);

			});
		});
	</script>
	
</div>
