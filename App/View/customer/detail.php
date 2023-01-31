<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=assets("plugins/fontawesome-free/css/all.min.css")?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=assets("css/adminlte.min.css")?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
<?=$data["navbar"]?>
<?=$data["sidebar"]?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Müşteri Detayı</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=requestLink()?>">Ana Sayfa</a></li>
              <li class="breadcrumb-item"><a href="<?=requestLink("customer")?>">Müşteriler</a></li>
              <li class="breadcrumb-item active">Detay</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
                  $customer = $data['customer'];
                ?>


    


  <div class="col-12">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h3 class="widget-user-username"><?=$customer->customer_name." ".$customer->customer_surname?></h3>
        <h5 class="widget-user-desc"><?=$customer->customer_company?></h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="<?=assets("img/user1-128x128.jpg")?>" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Sabit Telefon</h5>
              <span class="description-text"><?=$customer->customer_phone?></span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
            <h5 class="description-header">Cep Telefonu</h5>
              <span class="description-text"><?=$customer->customer_gsm?></span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">E-Posta</h5>
              <span class="description-text"><?=$customer->customer_email?></span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->

    <h5>Address</h5>
    <p><?=$customer->customer_address?></p>
  </div>



</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=assets("plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets("plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- bs-custom-file-input -->
<script src="<?=assets("plugins/bs-custom-file-input/bs-custom-file-input.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets("js/adminlte.min.js")?>"></script>

</body>
</html>
