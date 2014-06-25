<?php
	include "connect.php";
	include "seguridad.php";
	$LINK="<li><a href='admin.php'>Admin</a></li>
	<li><a href='addarticulo.php'>Nuevo producto</a></li>
	<li><a href='actualizar.php'>Actualizar</a></li>
	";

include("head.php"); ?>
<div class="col-md-8">
	<center><h1>Últimas Compras</h1></center>
	<table border="1px" width="100%">	
		<thead>
			
		<tr>
			<td>Imagen</td>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Stock</td>
			
		</tr>	
		</thead>

		<tbody>
			
<?php
		$limit=8;
		$pag=(int) $_GET["pag"];
		if($pag<1){
			$pag=1;
		}
		$offset=($pag-1)*$limit;

		$sql="SELECT SQL_CALC_FOUND_ROWS  articulo.nombre as nombre, stock,  valor, imagen FROM factura INNER JOIN clientes ON clientes.id=factura.fk_cliente INNER JOIN detallefactura ON detallefactura.fk_ventas=factura.id  INNER JOIN articulo ON articulo.id=detallefactura.fk_articulo LIMIT $offset, $limit";
		//$sql="SELECT SQL_CALC_FOUND_ROWS id, fk_ventas, fk_articulo, cantidad, subtotal FROM detallefactura  LIMIT $offset, $limit";
		$sqlTotal="SELECT FOUND_ROWS() AS total";

		$rs=mysqli_query($connect, $sql)or die("Error ".mysqli_error($connect));
		$rsTotal=mysqli_query($connect, $sqlTotal)or die("Error ".mysqli_error($connect));
		$rowTotal=mysqli_fetch_assoc($rsTotal);
		//$row=mysqli_fetch_array($rs);
		//var_dump($row);	
		$total=$rowTotal['total'];

		
         while ($row = mysqli_fetch_array($rs))
         {
          echo '<tr>
						<td><img style="width:50px; height:50px;" src=./img/'.$row['imagen'].'></td>
						
						<td>'.$row['nombre'].'</td>
						<td>'.$row['valor'].'</td>
						<td>'.$row['stock'].'</td>
						
						

					</tr>';
         }
     
			
		?>
	
		</tbody>
	</table>
	</section>
		
	<!-- +++++++++++++++++++++ -->
	
 

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
	<!-- +++++++++++++++++++++ -->

</div>
<?php include("footer.html"); ?>