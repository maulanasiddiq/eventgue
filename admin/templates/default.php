<!DOCTYPE html>
<html>
<?php require_once 'templates/partials/_head.php';
?>



<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php require_once 'templates/partials/_header.php';
    ?>
   <!-- MENU BAGIAN KIRI  -->
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php require_once 'templates/partials/_sidebar.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
      //require_once 'pages/dashboard.php';
       eval($content);#TAMPILKAN HALAMAN TERPILIH
    ?>

    

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once 'templates/partials/_footer.php'; #MEMANGGIL _SCRIPT.PHP
  ?>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require_once 'templates/partials/_script.php'; #MEMANGGIL _SCRIPT.PHP
?>
</body>
</html>
