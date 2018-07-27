$(document).ready(function() {
  // Instrucciones a ejecutar al terminar la carga
 var t=$('#dataTable').DataTable({
        responsive: true
    });
 var t1=$('#dataTable_1').DataTable();

 var servidor="http://192.168.100.170/mobile/PreciosLista/WebServices/";

  $.post( servidor+"getlistprecmaster.php", function( data ) {
 			objJson=JSON.parse(data);
 			idM=objJson.id_master;
 			deM=objJson.des_master;
 			for(i=0;i<idM.length;i++){
 				var list='<li class="nombre_procedimiento dropdown-item" id="'+idM[i]+'" onclik="">'+deM[i]+'</li>';
 				$("#nombre_procedimiento").append(list);
 			}
	});
	$(document).on('click','.nombre_procedimiento', function() {
		
		var rows = t1.rows().remove().draw();
		var rows = t.rows().remove().draw();


		id=$(this).attr("id");
		texto=$(this).text();
		$(".nombre_lista").text(texto);
		$.post( servidor+"getListaprecios.php?id="+id, function( data ) {
 			//resuto JSON
 			objJsonLista=JSON.parse(data);
 			id_preciolista=objJsonLista.id_preciolista;
 			nombre=objJsonLista.nombre;
 			codigo=objJsonLista.codigo;
 			vigencia_inicio=objJsonLista.vigencia_inicio
 			vigencia_termino=objJsonLista.vigencia_termino
 			$("#detalles_1").show();
 			for(j=0;j<id_preciolista.length;j++){
 				// add elementos tabla_1
			 	t.row.add( [
			 		   	codigo[j],
			           	nombre[j],
			           	vigencia_inicio[j],
			           	vigencia_termino[j]
			        ] ).draw( false );

			 	for(k=0;k<4;k++){
			 		var tr = $('#dataTable tbody tr:eq('+j+')');
			 		tr.find('td:eq('+k+')').attr("id",id_preciolista[j]);
			 		tr.find('td:eq('+k+')').addClass("select_dato_"+id_preciolista[j]);
			 		tr.find('td:eq('+k+')').addClass("select");
			 		t.row( tr ).draw();
			 	}
				
 			}
 			//Agregar Pointer
 			$('.odd').css( 'cursor', 'pointer' );
 			$('.even').css( 'cursor', 'pointer' );
 			//Mostrar Detalles dede Tabla_1
  			$('#dataTable tbody').on('click', 'td', function () {
  				var rows = t1.rows().remove().draw();
  				//var data = t.row( this ).data();
  				$(".select").removeClass("active");
  				id=$(this).attr("id");
  				$(".select_dato_"+id).addClass("active");
  				
  				
  				$.post( servidor+"getPrecios.php?id="+id, function( data ) {
		 			objJsonLista=JSON.parse(data);
		 			curso=objJsonLista.curso;
		 			precio=objJsonLista.precio;
		 			vigencia_inicio=objJsonLista.vigencia_inicio
		 			vigencia_termino=objJsonLista.vigencia_termino
		 			$("#detalles_2").show();
		 			for(k=0;k<curso.length;k++){
		 				//add elemento tabla_2
					 	t1.row.add( [
					 			curso[k],
					 			'',
					 		   	precio[k],
					           	vigencia_inicio[k],
					           	vigencia_termino[k],
					           	''
					        ] ).draw( false );
			 		}
  				});
		    });
		});
	});
	$(document).on('click','.menu_tab', function() {
		$(".menu_tab").removeClass("active");
		id=$(this).attr("id");
		$("#"+id).addClass("active");
		$(".vista_tab").hide();
		$("."+id).show();
		$("#vista_"+id).text(id);

	});

});




