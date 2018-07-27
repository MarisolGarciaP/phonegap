<?php 
  include "conexion.php";
  $datos=array();
  $id_master=array();
  $des_master=array();
  $query = oci_parse($conn, "select * from qk_listprecmaster_tb");
  oci_execute($query);
  while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
    array_push($id_master, $row['ID_MASTER']);
    array_push($des_master, $row['DESCRIPCION']);
  }
  $datos['result'] = array('id_master'=> $id_master,
  'des_master'=> $des_master);

  echo json_encode($datos['result']);
?>