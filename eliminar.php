<?php 
	session_start();
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id']!=$_POST['Id']){
			$datosNuevos[] = array(
								'Id'=>$arreglo[$i]['Id'],
								'Nombre'=>$arreglo[$i]['Nombre'],
								'Valor'=>$arreglo[$i]['Valor'],
								'Imagen'=>$arreglo[$i]['Imagen'],
								'Stock'=>$arreglo[$i]['Stock'],
								'Cantidad'=>$arreglo[$i]['Cantidad']

							);
		}
	}

	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
		echo "1";
	}else{
		unset($_SESSION['carrito']);
		$_SESSION['total']=0;
		echo '0';
	}
 ?>