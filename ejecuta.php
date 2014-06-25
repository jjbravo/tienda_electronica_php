<?php 
include "connect.php";
if($_POST['Caso']=='Eliminar'){
	mysqli_query($connect,"UPDATE  articulo SET estado='No Disponible' WHERE id=".$_POST['Id'])or die("Error".mysqli_error($connect));
	//unlink("./img/".$_POST['Imagen']);
	echo "el producto se ha Deshabilidado del inventario";
}
if($_POST['Caso']=='Actualizar'){
	$sql="UPDATE articulo SET nombre='".$_POST['Nombre']."', descripcion='".$_POST['Descripcion']."', valor=".$_POST['Valor'].", stock=".$_POST['Stock']." WHERE id=".$_POST['Id'];
	mysqli_query($connect,$sql) or die("Error ".mysqli_error($connect));
	//echo $sql;
	 echo "El producto se actualizo Correctamente";
}
 ?>