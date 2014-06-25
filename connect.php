<?php
/*
*	Proyecto foro en php
*	Autor: Jhon Jairo Bravo 
*	email: bramasterweb@gmail.com
*	Licencia: GNU/
*
*/
	$server='localhost';	//'mysql.hostinger.es';
	$user='root';	//'u329252966_bratc';
	$pass='a1s2d3f4';	//'a1s2d3f4';
	$db='carrito';	//'u329252966_foro';
	$connect=new mysqli($server,$user,$pass,$db);
	mysqli_report(MYSQLI_REPORT_ERROR);
 ?>