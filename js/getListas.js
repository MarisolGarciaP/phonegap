$(document).ready(function() {
  $('#dataTable').DataTable();
});

$('.tr_detail').click(function() {
	id=$(this).attr("id");
	console.log(id);

	$("#lita_precio").load('getListasprecio.php?id='+id);

});