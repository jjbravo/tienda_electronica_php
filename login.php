<?php
/*
*	Proyecto foro en php
*	Autor: Jhon Jairo Bravo 
*	email: bramasterweb@gmail.com
*	Licencia: GNU/
*
*/

include("connect.php");
if(isset($_SESSION['Entrada'])){
	$LOG="<li><a href='salir.php'>Salir</a>";
}else{
	$LOG="<li><a href='login.php'>Entrar</a>";

}

//cambiar config php.init desde el script
//codigo para cerrar sessions cuando se cierre el navegador
ini_set("session.use_only_cookies", "1");
ini_set("session.use_trans_sid", "0");
// session_name("loginUsuario");
session_start();
// if(isset($_SESSION['Entrada'])){

// 	$arreglo=$_SESSION["Entrada"];

// 	if($arreglo["Autenticado"]=="SI"){
// 		if($arreglo['Rol']=='admin'){

// 				 header("Location:admin.php");
// 		}elseif($arreglo['Rol']=='cliente'){
// 					//echo "Clientes";
// 				 header("Location:./compras/compras.php?i=".$arreglo['Clientes_id']);
// 		}

// 	}

// }
if(isset($_POST['usuario'])){
	$user=trim($_POST['usuario']);
	$pass=trim($_POST['password']);

	if($user=="" || $pass==""){
		header("Location:login.php?correcto=bl");

	}else{


//Conexion a la base de datos
		$query="SELECT usuario.id as usuario_id, passwd, user, rol, usuario.email as correo, nombre, apellidos, clientes.id as clientes_id FROM usuario INNER JOIN rol ON rol.id=usuario.fk_rol
		 INNER JOIN clientes ON clientes.fk_usuario=usuario.id WHERE user='$user' ||  usuario.email='$user'  AND passwd='$pass'";
		$result=mysqli_query($connect,$query) or die("Error ".mysqli_error($connect));
		// if (!mysqli_query($connect,$query)) {
		//  		 die('Error: ' . mysqli_error($connect));
		// 	}
		//$num_row=mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result)){
			$arreglo=array(
					'Idusuario'=>$row['usuario_id'],
					'User'=>$row['user'],
					'Rol'=>$row['rol'],
					'Correo'=>$row['correo'],
					'NombreApellidos'=>$row['nombre']." ".$row['apellidos'],
					'Clientes_id'=>$row['clientes_id'],
					'Autenticado'=>'SI',
					'UltimoAcceso'=>date("Y-n-j H:i:s")

				);
		}

		
		if(isset($arreglo)){
			session_name("loginUsuario");
			session_start();
			//cerrar session al cerrar el vagegador
			session_set_cookie_params(0,"/",$HTTP_SERVER_VARS["HTTP_HOST"],0); // Cambianos la duraccion de la cookie de session
			// FIN cerrar session al cerrar el navegador
			$_SESSION['Entrada']=$arreglo;
		/*	$_SESSION["autenticado"]="SI";
			$_SESSION["ultimoAcceso"]=date("Y-n-j H:i:s");
			$_SESSION["usuario_id"]=$row['usuario_id'];
			$_SESSION["clientes_id"]=$row['clientes_id'];
			$_SESSION['rol']=$row['rol'];
			$_SESSION["usuario"]=$row['nombre']." ".$row['apellidos'];
			*/
			if($arreglo['Rol']=='admin'){

			 header("Location:admin.php");
			}elseif($arreglo['Rol']=='cliente'){
				//echo 	$_SESSION["clientes_id"];
			header("Location:./compras/compras.php?i=".$arreglo['Clientes_id']);
			}
			

			

		}else{
			header("Location:login.php?correcto=no");
		}
	}
mysqli_close();
}else{
	$TITLE="Login";
	include("head.php");
?>
<div class="col-md-8">
	<div class="col-md-6">
		<h2>Nuevo comprador</h2>
		<a href="#">Registrarse</a><br><br>
		<p>Registrate y lleva un control de todas tus compras y de todos los proyectos</p>
	</div>
	<div class="col-md-4">
		<div class="section">
			<div class="login">
				
				<h2>Login</h2><hr><br>
				<?php if($_GET['correcto']=="no"){?>
				<p id="alert" class="warning" >Usuario o contraseña incorrectos</p>
				<?php }elseif($_GET['correcto']=="bl"){?> <p id="alert" class="warning" >Ingrese un usuario y contraseña</p> <?php }else{ ?><p>Ingrese su usuario y contraseña</p> <?php } ?><br>
				<form action="login.php" method="post"><label for="usuario">Email ó Usuario</label>
					<input id="usuario" type="text" autocomplete="off"  placeholder="Usuario" name="usuario"><br>
					<label for="pwd">Contraseña</label>
					<input id="pwd" type="password" placeholder="Contraseña" name="password">		
					<button type="submit"  >Entrar</button>	
					<br><br>
				</form>
			</div>
		</div>
	</div>

</div>

<?php include("footer.html"); } ?>