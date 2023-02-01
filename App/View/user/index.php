<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>Profil Güncelle</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=requestLink()?>">Ana Sayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?=requestLink("customer")?>">Profiller</a></li>
                                <li class="breadcrumb-item active">Güncelle</li>
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
                                    <h3 class="card-title">Profil Güncelle</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                    <div class="card-body">
                                        <div class="row">

                                        <form id="updateUser" class="col-6">
                                            <div class=" col-12">
                                                <div class="form-group col-12">
                                                    <label for="name">Adı</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="<?=$user["name"]?>"
                                                        placeholder="Adı">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="surname">Soyadı</label>
                                                    <input type="text" class="form-control" id="surname"
                                                        name="surname" value="<?=$user["surname"]?>"
                                                        placeholder="Soyadı">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="email">E-Posta</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="<?=$user["email"]?>"
                                                        placeholder="E-Posta">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Profil Güncelle</button>
                                                </div>


                                            </div>
                                        </form>
                                        <form id="updatePassword" class="col-6">
                                              <div class="col-12">
                                                  <div class="form-group col-12">
                                                      <label for="currentPassword">Mevcut Şifre</label>
                                                      <input type="text" class="form-control" id="currentPassword" name="currentPassword">
                                                  </div>
                                                  <div class="form-group col-12">
                                                      <label for="newPassword">Yeni Şifre</label>
                                                      <input type="text" class="form-control" id="newPassword" name="newPassword" >
                                                  </div>
                                                  <div class="form-group col-12">
                                                      <label for="reNewPassword">Yeni Şifre Tekrar</label>
                                                      <input type="text" class="form-control" id="reNewPassword" name="reNewPassword">
                                                  </div>

                                                  <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Şifre Güncelle</button>
                                                  </div>
                                                  
                                                
                                              </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    
                              
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.6/axios.min.js"
        integrity="sha512-RUkwGPgBmjCwqXpCRzpPPmGl0LSFp9v5wXtmG41+OS8vnmXybQX5qiG5adrIhtO03irWCXl+z0Jrst6qeaLDtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>


    let formUpdateUser = document.getElementById("updateUser");
    formUpdateUser.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        axios.post("<?=requestLink("user/edit")?>", formData)
            .then(res => {
              Swal.fire(res.data.title, res.data.msg, res.data.status)
            })
            .catch(error => {
                console.log(error);
            })
    })


    let formUpdatePassword = document.getElementById("updatePassword");
    formUpdatePassword.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        axios.post("<?=requestLink("user/change-password")?>", formData)
            .then(res => {
              if(res.data.status=="success"){
                Swal.fire(res.data.title, res.data.msg, res.data.status)
              .then(()=>{
                window.location.reload();
              })
              }
              else{
                Swal.fire(res.data.title,res.data.msg,res.data.status)
              }

            })
            .catch(error => {
                console.log(error);
            })
    })
    </script>

</body>

</html>