<?php 

namespace App\Controllers;

use Core\BaseController;
use App\Model\ModelCustomer;

class Customer extends BaseController
{

    public function index(){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $ModelCustomer = new ModelCustomer();
        $data['customers'] = $ModelCustomer->getAllCustomers();

        echo $this->view->load("customer/index",$data);
    }

    public function detail($id){

        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $ModelCustomer = new ModelCustomer();
        $customer = $ModelCustomer->getCustomer($id);

        $data['customer'] = $customer;


        echo $this->view->load("customer/detail",$data);
    }

    public function add(){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");
        echo $this->view->load("customer/add",$data);
    }

    public function createCustomer(){
        $post = $this->request->post();

        if(!$post["customer_name"] || !$post["customer_surname"]){
            echo $this->request->response("error","Ops! Dikkat","Müşteri adı ve soyadı boş olamaz.");
            exit();
        }
        
        $ModelCustomer = new ModelCustomer();
        $result = $ModelCustomer->addCustomer($post);

        if($result){
            echo $this->request->response("success","İşlem Başarılı","Müşteri bilgileri başarıyla eklendi.",["redirect"=>requestLink("customer")]);
            exit();
        }else{
            echo $this->request->response("error","Ops! Dikkat","Beklenmedik bir hata meydana geldi. Lütfen sayfayı yenileyip tekrar deneyin.");
            exit();
        }


    }


    // Customer Update Page
    public function update($id){

        $ModelCustomer = new ModelCustomer();
        $customer = $ModelCustomer->getCustomer($id);

        $data['customer'] = $customer;
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");
        echo $this->view->load("customer/update",$data);
    }

    // Customer Update PUT Request
    public function updateCustomer(){
        $post = $this->request->post();



        if(!isset($post["customer_id"])){
            echo $this->request->response("error","Ops! Dikkat","Kullanıcı adı olmadan kullanıcı güncelleyemezsin!");
            exit();
        }

        if(!$post["customer_name"] || !$post["customer_surname"]){
            echo $this->request->response("error","Ops! Dikkat","Müşteri adı ve soyadı boş olamaz.");
            exit();
        }
        


        $ModelCustomer = new ModelCustomer();
        $result = $ModelCustomer->updateCustomer($post);


        if($result){
            echo $this->request->response("success","İşlem Başarılı","Müşteri bilgileri başarıyla güncellendi",["redirect"=>requestLink('customer')]);
            exit();
        }
        else{
            echo $this->request->response("error","Ops! Dikkat","Beklenmedik bir hata meydana geldi. Lütfen sayfayı yenileyip tekrar deneyin.");
            exit();
        }

    }

    public function delete(){
        $post = $this->request->post();
     
        if(!isset($post["customer_id"])){
            echo $this->request->response("error","Ops! Dikkat","Müşteri bilgisi alınamadı.");
            exit();
        }

        $ModelCustomer = new ModelCustomer();
        $result = $ModelCustomer->deleteCustomer($post);

        if($result){
            echo $this->request->response("success","İşlem Başarılı","Müşteri başarıyla silindi!");
            exit();
        }
        else{
            echo $this->request->response("error","Ops! Dikkat","Beklenmedik bir hata meydana geldi. Lütfen sayfayı yenileyip tekrar deneyin.");
            exit();
        }

 
        
    }
}


?>