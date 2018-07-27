<?php

  error_reporting(0);
  ini_set('display_errors', 1);
  include "conex/conexion.php";
  $id=$_REQUEST['id'];
?> 
<head>
  
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>    
      <div class="card-header">
        <i class="fa fa-table"></i>Listas
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Cod.Lista</th>
                <th>Nombre</th>
                <th>Vig.Ini</th>
                <th>Vig.Fin</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Cod.Lista</th>
                <th>Nombre</th>
                <th>Vig.Ini</th>
                <th>Vig.Fin</th>
              </tr>
            </tfoot> 
            <tbody>
              <?php
                $query = oci_parse($conn, "select * from qk_lista_precios_tb WHERE ID_MASTER=".$id);
                oci_execute($query);
                while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
                    ?>
                      <tr class="tr_detail" id=<?php echo $row['ID_PRECIOLISTA']?> style="cursor: pointer">
                        <td class="table_td_pointer"><?php echo $row['CODIGO']?></td>
                        <td><?php echo $row['NOMBRE']?></td>
                        <td><?php echo $row['VIGENCIA_INICIO']?></td>
                        <td><?php echo $row['VIGENCIA_TERMINO']?></td>
                      </tr>

                    <?php
                  }

              ?>
            </tbody>
          </table>
        </div>
      </div>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="js/getListas.js"></script> 
  

          
