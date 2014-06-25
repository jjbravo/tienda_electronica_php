$(function(){
	$(".cantidad").change(function(e){
		
			
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				var total=precio*cantidad;
				//$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+total);
				//alert(total);
				
				$.post(
					'./modificarDatos.php',
					{
						Id:id,
						Precio:precio,
						Cantidad:cantidad
					},function(e){
						//$("#total").text(e);
						location.reload();
					}
				);	
		
	});

	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr("data-id");
		$(this).parentsUntil(".producto").remove();
		$.post(
			'./eliminar.php',{
				Id:id
			},function(a){
				if(a=="0"){
					//alert("a=0");
					location.reload();
				}else{
					location.reload();

				}
			});
	});



});