<?php
/*
*	Proyecto foro en php
*	Autor: Jhon Jairo Bravo 
*	email: bramasterweb@gmail.com
*	Licencia: GNU/
*
*/
	//session_name("loginUsuario");
	session_start();
	$arreglo=$_SESSION['Entrada'];
	
	if($arreglo['Autenticado']!="SI"){
		header("Location:index.php");
	}
	else{
		$fecha_ultimoAcceso=$arreglo["UltimoAcceso"];
		$hora=date("Y-n-j H:i:s");
		$tiempo_transcurrido=(strtotime($hora)-strtotime($fecha_ultimoAcceso));
		if($tiempo_transcurrido>=600){ //10*60=600 nimutos a segundos 
			//si pasan 10 minutos
			session_destroy();
			header("Location:index.php");
		}else{
			$arreglo["UltimoAcceso"]=$hora;
			$_SESSION['Entrada']=$arreglo;
		}
	}
?>