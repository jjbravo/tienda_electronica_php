<?php 
include "connect.php";

	if(!isset($_POST['nombre']) 
			&& !isset($_POST['descripcion']) 
			&& !isset($_POST['valor'])
			&& !isset($_POST['stock'])
			&& !isset($_POST['fk_categoria'])
			){
			header("Location:addarticulo.php");
		}else{
			
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp=explode(".", $_FILES['file']['name']);
			$extension=end($temp);
			$imagen="";
			$random=rand(1,999999);
			if((($_FILES['file']['type']=="image/gif")
				|| ($_FILES['file']['type']=="image/jpeg")
				|| ($_FILES['file']['type']=="image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES['file']['type']=="image/png"))){

				if($_FILES['file']['error']>0){
					echo "Error numero: ".$_FILES['file']['error']."<br>";
				}else{
					$imagen=$random."_".$_FILES['file']['name'];
					if(file_exists("./img/".$random."_".$_FILES['file']['name'])){
						echo $_FILES['file']['name']. " Ya existe.";
					}else{
						move_uploaded_file($_FILES['file']['tmp_name'], 
							"./img/".$random."_".$_FILES['file']['name']);
						echo "Archivo guardado en ./img/".$random."_".$_FILES['file']['name']."<br>";
				
						$nombre=$_POST['nombre'];
						$descripcion=$_POST['descripcion'];
						
						$valor=$_POST['valor'];
						$stock=$_POST['stock'];
						$categoria=$_POST['fk_categoria'];

		$sql="INSERT INTO articulo(nombre,descripcion,imagen,valor,stock,fk_categoria) VALUES(
			'".$nombre."',
			'".$descripcion."',
			'".$imagen."', 
			".$valor.", 
			".$stock.", 
			".$categoria.")";

						mysqli_query($connect,$sql)or die(mysqli_error($connect));

						header("Location:admin.php");

					}
				}
			}else{
				echo "Formato no permitido";
			}

		}


 ?>