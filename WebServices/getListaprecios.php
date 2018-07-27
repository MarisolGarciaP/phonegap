<?php 
  include "conexion.php";
  $datos=array();
  $id=$_REQUEST['id'];
  $id_preciolista=array();
  $id_master=array();
  $nombre=array();
  $codigo=array();
  $vigencia_inicio=array();
  $vigencia_termino=array();
  $query = oci_parse($conn, "select * from qk_lista_precios_tb WHERE ID_MASTER=".$id);
  oci_execute($query);
  while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
    array_push($id_preciolista, $row['ID_PRECIOLISTA']);
    array_push($id_master, $row['ID_MASTER']);
    array_push($nombre, $row['NOMBRE']);
    array_push($codigo, $row['CODIGO']);
    array_push($vigencia_inicio, $row['VIGENCIA_INICIO']);
    array_push($vigencia_termino, $row['VIGENCIA_TERMINO']);
  }
  $datos['result'] = array('id_preciolista'=> $id_preciolista,
  'id_master'=> $id_master,
  'nombre'=> $nombre,
  'codigo'=> $codigo,
  'vigencia_inicio'=> $vigencia_inicio,
  'vigencia_termino'=> $vigencia_termino);

  echo json_encode($datos['result']);
?>