<?php

namespace App\Controllers;

use App\Model\ModelAuth;
use Core\BaseController;
use Core\Session;



class Auth extends BaseController
{

    // Login Page
    public function index(){
     
        $data['form_link'] = requestLink('login');
        echo $this->view->load("auth/index",$data);
    }

    // Login Form Post Response
    public function login(){    
        $post = $this->request->post();



        if(!($post['email'])){
            $status = 'error';
            $title  = 'Ops! Dikkat';
            $msg    = 'E-Posta Adresi Boş Olamaz.';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg ],JSON_UNESCAPED_UNICODE);
            exit();
        }

        if(!($post['password'])){
            $status = 'error';
            $title  = 'Ops! Dikkat';
            $msg    = 'Şifre boş olamaz.';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg ],JSON_UNESCAPED_UNICODE);
            exit();
        }

        $authModel = new ModelAuth();
        $access = $authModel->userLogin($post);

        // Response
        if($access){
            $status = 'success';
            $title  = 'İşlem Başarılı';
            $msg    = 'İşlem Başarıyla Tamamlandı';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg,"redirect"=>requestLink()],JSON_UNESCAPED_UNICODE);
            exit();
        }
        else{
            $status = 'error';
            $title  = 'Ops! Dikkat';
            $msg    = 'Beklenmedik bir hata meydana geldi. Lütfen sayfanızı yenileyip tekrar deneyin.';
            echo json_encode(['status' => $status , 'title' => $title , 'msg' => $msg ],JSON_UNESCAPED_UNICODE);
            exit();
        } // Response statment end
        
        
        
    }


    public function logout(){
        Session::removeSession();
        redirect("login");
    }
}