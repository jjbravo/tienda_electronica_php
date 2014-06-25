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
	unset($_SESSION['Entrada']);
	session_destroy();

	$TITLE="Salida segura";
	include("head.php");
?>
<div class="container">
	<div class="section">
	 	<h3>Salida segura</h3>
			
	 	<p>Gracias por tu visita</p><br>
	 	<a href="index.php">Login</a>
	</div>
</div>
<br>
<br>
<br>
<br>

<br>
<br>
<?php 
include("footer.html");
?>

