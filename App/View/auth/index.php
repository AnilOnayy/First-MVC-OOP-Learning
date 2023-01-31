<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=assets("plugins/fontawesome-free/css/all.min.css")?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=assets("plugins/icheck-bootstrap/icheck-bootstrap.min.css")?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=assets("css/adminlte.min.css")?>">
  <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css
" rel="stylesheet"></link>

</head>
<body class="hold-transition login-page">
<div class="login-box" style="    height: 100vh;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>CMS</b>Project</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Oturum açmak için lütfen giriş yapın</p>

      <form id="login">
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control" placeholder="E-Posta">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
    
          <div class="col-12">
            <button type="submit"  class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=assets("plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets("plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets("js/adminlte.min.js")?>"></script>
<script src="<?=assets("plugins/sweetalert2/sweetalert2.all.min.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.6/axios.min.js" integrity="sha512-RUkwGPgBmjCwqXpCRzpPPmGl0LSFp9v5wXtmG41+OS8vnmXybQX5qiG5adrIhtO03irWCXl+z0Jrst6qeaLDtQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const login = document.getElementById("login");

    login.addEventListener("submit",(e)=>{

      let email = document.getElementById("email").value;
      let password = document.getElementById("password").value;


      let formData = new FormData();
      formData.append('email',email);
      formData.append('password',password);

      e.preventDefault();

      axios.post('<?=$data['form_link']?>',formData)
      .then(res=>{

        if(res.data.redirect){
          window.location.href=res.data.redirect;
        }
        else{
        Swal.fire(res.data.title,res.data.msg,res.data.status);
        }
     

      })
      .catch(error=>{
        console.log(error);
      })
      
    })

</script>


</body>
</html>
