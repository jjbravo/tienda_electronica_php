

<?php 

// session_destroy(); 
// unset($_SESSION['total']);
session_start();
if(isset($_SESSION['Entrada'])){
	$LOG="<li><a href='salir.php'>Salir</a>";
}else{
	$LOG="<li><a href='login.php'>Entrar</a>";

}


include("head.php");

include("connect.php");

$limit=4;
		$pag=(int) $_GET["pag"];
		if($pag<1){
			$pag=1;
		}
		$offset=($pag-1)*$limit;

		$sql="SELECT SQL_CALC_FOUND_ROWS articulo.id as id, nombre, imagen, valor, stock FROM articulo INNER JOIN categoria ON categoria.id=articulo.fk_categoria WHERE estado='Disponible' LIMIT $offset, $limit";
		
		$sqlTotal="SELECT FOUND_ROWS() AS total";

		$rs=mysqli_query($connect, $sql)or die("Error ".mysqli_error($connect));
		$rsTotal=mysqli_query($connect, $sqlTotal)or die("Error ".mysqli_error($connect));
		$rowTotal=mysqli_fetch_assoc($rsTotal);
		//$row=mysqli_fetch_array($rs);
		//var_dump($row);	
		$total=$rowTotal['total'];
		
// $query=mysqli_query($connect,$sql);
$num_row=mysqli_num_rows($rs);

?> 
 <div class="col-md-8">
	<h1>Tienda</h1>

	
	<?php
	
	if($num_row>0){

		while($row=mysqli_fetch_array($rs)){

			?>
			<div class="col-xs-6 col-md-3">
				<div class="thumbnail">
				 <a href="./detalle.php?id=<?php echo $row['id']; ?>" class="thumbnail">
	      <img src="./img/<?php echo $row['imagen'];?>" alt="...">
	    </a>
				<span style="color:	#2E70BC;"><?php echo $row['nombre']; ?> </span><br>
				<span style="color:	#2E70BC;">$ <?php echo $row['valor']; ?> </span><br>
				<span style="color:	#2E70BC;"><strong>Stock </strong><?php echo $row['stock']; ?> </span><br>
				 <a href="./detalle.php?id=<?php echo $row['id']; ?>" >Ver mas
 					</a><br>
 					<?php if($row['stock']==0) {?>
 					<a disabled class="btn btn-danger btn-xs" href="./carrito.php?id=<?php echo $row['id']; ?>">No disponible</a>
					<?php }else{ ?>
 					<a class="btn btn-success btn-xs" href="./carrito.php?id=<?php echo $row['id']; ?>">Añadir al carrito</a>
					<?php } ?>
			</div>
			</div>

			<?php
		}
	}else{

		echo "aun no existen articulos registrados";
	}




	?> 
	<div class="col-md-12"><center>
		
	
<ul class="pagination">
	<?php 
         $totalPag = ceil($total/$limit);
         

if(($pag-1)==0){
	echo "<li><a href='#'>&laquo;</a></li>";
}else{
	echo "<li><a href='?pag=".($pag-1)."'>&laquo;</a></li>";

}
         for( $i=1; $i<=$totalPag ; $i++)
         {
         	if($pag==$i){

            echo "<li class='active'><a href=\"?pag=$i\"><b>$i</b></a></li>"; 
         	}else{
         		
            echo "<li><a href=\"?pag=$i\">$i</a></li>"; 
         	}
         }
   if($pag==$totalPag){
	echo "<li><a href='#'>&raquo;</a></li>";

   }else{

	echo "<li><a href=\"?pag=".($pag+1)."\">&raquo;</a></li>";
   }    
      
 ?>	
</ul>
	</center>
	</div>
</div>


<?php



include("footer.html");

?>