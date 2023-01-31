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
  <link rel="stylesheet" href="<?=assets("plugins\summernote\summernote.min.css")?>">
  
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


    

<div class="row">
  <div class="col-12 col-md-4">
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

    <div class="col-12 col-md-8">
    <textarea id="summernote"><?=$customer->customer_note?></textarea>
    
    <div class="btn-group mt-2 w-100">
      <button class="btn btn-dark w-100" onclick="saveNote()">Notu Kaydet</button>
    </div>
    </div>

</div>
  

  <div class="card">
                   

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th >Proje</th>
                                        <th>Durum</th>
                                        <th>İlerleyiş</th>
                                        <th style="width: 40px">Eylem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($data['projects']==""){
                                        ?>
                                        <tr>
                                            <td>Bu müşterinin herhangibir projesi yok.</td>
                                        </tr>
                                        <?php
                                    }
                                    else{

                                        // Left join customers
                                        foreach($data['projects'] as $project){
                                       
                                          ?>

                                    <tr id="<?=$project->id?>">
                                        <td><?=$project->title?></td>
                                        <td><?=$project->status=="a" ? "Aktif" : "Pasif"?></td>
                                      
                                        <td>
                                            <?=$project->progress?> %
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: <?=$project->progress?>%">
                                                </div>
                                            </div>
                                            <br>

                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button onclick="removeproject(<?=$project->id?>)"
                                                    class="btn btn-sm btn-danger">Sil</button>
                                                <a href="<?=requestLink('project/update/'.$project->id)?>"
                                                    class="btn btn-sm btn-info">Güncelle</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php } 
                                      }
                                    ?>

                        </div>


                        </tr>
                        </tbody>
                        </table>
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
<script src="<?=assets("plugins\summernote\summernote.min.js")?>"></script>
<script src="<?=assets("plugins/sweetalert2/sweetalert2.all.min.js")?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.6/axios.min.js"
        integrity="sha512-RUkwGPgBmjCwqXpCRzpPPmGl0LSFp9v5wXtmG41+OS8vnmXybQX5qiG5adrIhtO03irWCXl+z0Jrst6qeaLDtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>

$(document).ready(function() {
  $('#summernote').summernote({
    height:'223px'
  });
});


  function saveNote(){
    let note = $("#summernote").summernote("code");
    
    let formData = new FormData();
    formData.append("customer_id",<?=$customer->customer_id?>);
    formData.append("note",note);

    axios.post('<?=requestLink('customer/note')?>',formData)
    .then(res=>{
            Swal.fire(res.data.title,res.data.msg,res.data.status)
      
    })
    .catch(error=>{
        console.log(error);
    })
  }


    function removeproject(id) {

        Swal.fire({
            title: 'Silmek istediğinize emin misiniz?',
            text: "Bu işlemi geri alamazsınız.",
            icon: 'warning',
            showCancelButton: true,
            reverseButtons:true,
            confirmButtonColor: ' #d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sil!',
            cancelButtonText:'Vazgeç',
        }).then((result) => {
            if (result.isConfirmed) {

                let formData = new FormData();
                formData.append("project_id",id);

                axios.post('<?=requestLink('project/delete')?>',formData)
                .then(res=>{

                    if(res.data.status=="success"){
                        Swal.fire(res.data.title,res.data.msg,res.data.status)
                        .then(()=>{
                           document.getElementById(id).remove();
                        })
                    }
                    else{
                        Swal.fire(res.data.title,res.data.msg,res.data.status);
                    }
                   
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        })
    }
    </script>

</body>
</html>
