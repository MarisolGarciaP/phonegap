<?php
 include "conex/conexion.php"
?>
<!DOCTYPE html>
<html lang="ES">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
    include "navbar.php";
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-xl-8 col-sm-8 mb-8">
          <h2>Configuración Lista de Precios</h2>
        </div>
        <div class="col-xl-4 col-sm-4 mb-4">
          <center>
            <div class="btn-group">
              <button type="button" class="btn  btn-primary dropdown-toggle " data-toggle="dropdown" aria-expanded="false">
                <span class="fa fa-fw fa-dashboard"></span>
                <span class="nombre_lista">Nombre Lista</span><span class="caret"></span>
              </button>
              <input type="hidden" id="nombre_lista_input" name="nombre_lista_input" value="">
              <ul class="dropdown-menu dropdown-menu-left" id="nombre_procedimiento" name="" role="menu">
                <?php 
                  $query = oci_parse($conn, "select * from qk_listprecmaster_tb");
                  oci_execute($query);
                  while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
                    ?>
                      <li class="nombre_procedimiento dropdown-item"" id="<?php echo $row['ID_MASTER'];?>">
                          <?php echo $row['DESCRIPCION'];?>
                      </li>
                    <?php
                  }
                ?>
                
              </ul>
            </div>
          </center>
        </div> 
      </div>

      <!-- Example DataTables Card-->
      <div class="card mb-3" id="lita_detalles">
      </div>
      <div class="card mb-3" id="lita_precio">
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Quick Learning 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Salir</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecciona "Salir" Si deseas cerrar sesion.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="index.php">Salir</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!--<script src="js/sb-admin-datatables.min.js"></script>-->
    <script src="js/inicio.js"></script>
  </div>
</body>

</html>
