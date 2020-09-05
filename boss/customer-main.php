<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../framework/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../framework/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../framework/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../framework/admin/css/sb-admin.css" rel="stylesheet">

  </head>


  <body id="page-top">

	<!-- header --!>

   <?php require_once("gen/admin/header.php"); ?>

    <div id="wrapper">

      <!-- Sidebar -->

      <?php require_once("gen/admin/sidebar.php"); ?>

      <!--<div id="content-wrapper"> -->

        <?php require_once("customer-panel.php"); ?>


    <!-- Bootstrap core JavaScript-->
    <script src="../framework/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../framework/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../framework/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../framework/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../framework/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../framework/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../framework/admin/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../framework/admin/js/demo/datatables-demo.js"></script>
    <script src="../framework/admin/js/demo/chart-area-demo.js"></script>




</body>
</html>
