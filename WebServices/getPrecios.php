<?php 
  include "conexion.php";
  $datos=array();
  $id=$_REQUEST['id'];
  $id_preciolista=array();
  $curso=array();
  $precio=array();
  $vigencia_inicio=array();
  $vigencia_termino=array();
  $query = oci_parse($conn, "select * from qk_precioscursos_tb WHERE ID_PRECIOLISTA=".$id);
  oci_execute($query);
  while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
    array_push($curso, $row['NOMBRE']);
    array_push($precio, $row['PRECIO']);
    array_push($vigencia_inicio, $row['VIGENCIA_INICIO']);
    array_push($vigencia_termino, $row['VIGENCIA_TERMINO']);
  }
  $datos['result'] = array('curso'=> $curso,
  'precio'=> $precio,
  'vigencia_inicio'=> $vigencia_inicio,
  'vigencia_termino'=> $vigencia_termino);

  echo json_encode($datos['result']);
?>