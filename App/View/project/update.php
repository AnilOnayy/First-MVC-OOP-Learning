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
            <h1>Proje Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=requestLink()?>">Ana Sayfa</a></li>
              <li class="breadcrumb-item"><a href="<?=requestLink("projects")?>">Projeler</a></li>
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
                <h3 class="card-title">Proje Ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="addProject">
              <?php
                $project = $data["project"];
                ?>
                <input type="hidden" name="project_id" value="<?=$project->id?>">
               
                <div class="card-body">
                <div class="form-group">
                    <label for="project_customer_id">Müşteri Seçin</label>
                    <select name="project_customer_id" class="form-control" id="">
                      <?php 
                        foreach($data['customers'] as $customer){
                          ?>
                            <option value="<?=$customer->customer_id?>"  <?=$project->customer_id==$customer->customer_id ? "selected" : "" ?> ><?=$customer->customer_name." ".$customer->customer_surname?></option>
                          <?php
                        }
                      ?>
                     
                    </select>
                   
                  </div>
                  <div class="form-group">
                    <label for="project_title">Proje Başlığı</label>
                    <input type="text" class="form-control" id="project_title" name="project_title" value="<?=$project->title?>" placeholder="Proje Başlığı">
                  </div>
                  <div class="form-group">
                    <label for="project_detail">Proje Detayları</label>
                    <textarea rows="3" cols="30"  class="form-control" id="project_detail" name="project_detail" value="" placehol der="Proje Detay Bilgileri"><?=$project->description?></textarea>
             
                  </div>
                  <div class="form-group">
                    <label for="project_start_date">Başlangıç Tarihi</label>
                    <input type="date" class="form-control" id="project_start_date" name="project_start_date" value="<?=$project->start_date?>" placeholder="Firma Adı">
                  </div>
                  <div class="form-group">
                    <label for="project_end_date">Bitiş Tarihi</label>
                    <input type="date" class="form-control" id="project_end_date" name="project_end_date" value="<?=$project->end_date?>" placeholder="Firma Adı">
                  </div>
                  <div class="form-group">
                    <label for="project_progress">İlerleyiş</label>
                    <input type="range" class="form-control" min="0" max="100" id="project_progress" name="project_progress" value="<?=$project->progress?>" placeholder="Telefon">
                  </div>
                  <div class="form-group">
                    <label for="project_status">Proje Durumu</label>
                    <select name="project_status" class="form-control" id="">
                        <option value="a" <?=$project->status=="a" ?"selected" : "";?> >Aktif</option>
                        <option value="p"  <?=$project->status=="p" ?"selected" : "";?>  >Pasif</option>
                    </select>
                   
                  </div>
      
                 

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Güncelle</button>
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
    let form = document.getElementById("addProject");

    form.addEventListener("submit",function(e){

        e.preventDefault();
        let formData = new FormData(this);

        console.log(formData);

        axios.post("<?=requestLink("project/update")?>",formData)
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
