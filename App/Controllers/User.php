<?php 

namespace App\Controllers;

use App\Model\ModelUser;
use Core\BaseController;
use Core\Session;

class User extends BaseController
{

    public function index(){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");
        $data['user'] = Session::getAllSession();
        echo $this->view->load("user/index",$data);
    }


    public function editProfile(){
        $post = $this->request->post();

        if($post["email"]==""){
            echo $this->request->response("error","Ops! Dikkat","E-Mail Boş Olamaz.");
            exit();
        }

        
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $ModelUser = new ModelUser;
        $result = $ModelUser->editProfile($post);

        if($result){
            echo $this->request->response("success","İşlem Başarılı","Kullanıcı başarıyla güncellendi");
            exit();
        }
        else{
            echo $this->request->response("error","Ops! Dikkat","Herhangibir güncelleme olmadı.");
            exit();
        }
    }


    public function changePassword(){

        $post = $this->request->post();      
        

     
        
        $currentPass =md5($post["currentPassword"]);
        $newPassword = $post["newPassword"];
        $reNewPassword = $post["reNewPassword"];
        $sessionPass = Session::getSession("password");


        // Session::setSession("password",md5(1));


        // If current password is not equals to inputting new password
        if($currentPass != $sessionPass ){
            echo $this->request->response("error","Ops! Dikkat","Mevcut şifreniz yanlış!");
            exit();
        }

        
        // If new password equals to old password
        if(md5($newPassword)==Session::getSession("password")){
            echo $this->request->response("error","Ops! Dikkat","Şifreniz eski şifreniz ile aynı olamaz!");
            exit();
        }

        // If empty the new password
        if(!$newPassword){
            echo $this->request->response("error","Ops! Dikkat","Yeni şifre boş olamaz!");
            exit();
        }

        // If Empty The Re New Password
        if(!$reNewPassword){
            echo $this->request->response("error","Ops! Dikkat","Yeni şifre tekrarı boş olamaz!");
            exit();
        }
        // If not equals the new passwords

        if($newPassword!=$reNewPassword){
            echo $this->request->response("error","Ops! Dikkat","Yeni şifreler aynı olmalıdır!");
            exit();
        }

        $ModelUser = new ModelUser();
        $result = $ModelUser->changePassword($post);
        
        
        if($result){
            echo $this->request->response("success","İşlem Başarılı","Kullanıcı başarıyla güncellendi");
            exit();
        }
        else{
            echo $this->request->response("error","Ops! Dikkat","Müşteriye ulaşılamadı. Lütfen tekrar deneyin.");
            exit();
        }


    }



  

}


?>