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
            <h1>Müşteri Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=requestLink()?>">Ana Sayfa</a></li>
              <li class="breadcrumb-item"><a href="<?=requestLink("customer")?>">Müşteriler</a></li>
              <li class="breadcrumb-item active">Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Müşteri Ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="addCustomer">
                <div class="card-body">
                  <div class="form-group">
                    <label for="customer_name">Müşteri Adı</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Müşteri Adı">
                  </div>
                  <div class="form-group">
                    <label for="customer_surname">Müşteri Soyadı</label>
                    <input type="text" class="form-control" id="customer_surname" name="customer_surname" placeholder="Müşteri Soyadı">
                  </div>
                  <div class="form-group">
                    <label for="customer_company">Firma Adı</label>
                    <input type="text" class="form-control" id="customer_company" name="customer_company" placeholder="Firma Adı">
                  </div>
                  <div class="form-group">
                    <label for="customer_phone">Sabit Telefon</label>
                    <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Telefon">
                  </div>
                  <div class="form-group">
                    <label for="customer_gsm">GSM</label>
                    <input type="text" class="form-control" id="customer_gsm" name="customer_gsm" placeholder="Gsm">
                  </div>
                  <div class="form-group">
                    <label for="customer_email">E-Posta</label>
                    <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="E-Posta">
                  </div>
                  <div class="form-group">
                    <label for="customer_address">Müşteri Adresi</label>
                    <textarea rows="3" cols="30"  class="form-control" id="customer_address" name="customer_address" placehol der="Müşteri Adresi"></textarea>
             
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ekle</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

    


          </div>
          <!--/.col (left) -->
     
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<script src="<?=assets("plugins/sweetalert2/sweetalert2.all.min.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.6/axios.min.js" integrity="sha512-RUkwGPgBmjCwqXpCRzpPPmGl0LSFp9v5wXtmG41+OS8vnmXybQX5qiG5adrIhtO03irWCXl+z0Jrst6qeaLDtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    let form = document.getElementById("addCustomer");

    form.addEventListener("submit",function(e){

        e.preventDefault();
        let formData = new FormData(this);

        console.log(formData);

        axios.post("<?=requestLink("customer/add")?>",formData)
        .then(res=>{
            if(res.data.status=="success"){
                Swal.fire(res.data.title,res.data.msg,res.data.status)
                .then(()=>{
                    window.location.href=res.data.data.redirect;
                })
            }else{
                Swal.fire(res.data.title,res.data.msg,res.data.status)
            }
        })
        .catch(error =>{
            console.log(error);
        })

    })
</script>

</body>
</html>
