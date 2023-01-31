<?php 

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelProject;
use Core\BaseController;

class Project extends BaseController
{

    private $anil = "123";
    
    public function index(){

        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");


        $ModelProject = new ModelProject();
        $data ['projects']= $ModelProject->getAllProjects();
        
        echo $this->view->load("project/index",$data);
    }

    
    public function detail($id){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");
        echo $this->view->load("project/index",$data);
    }


    // GET
    public function add(){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $cust = new ModelCustomer();
        $data['customers'] = $cust->getAllCustomers();
        echo $this->view->load("project/add",$data);
    }
    // POST
    public function createProject(){
        $post = $this->request->post();


        if(!$post["project_title"]){
            echo $this->request->response("error","Ops! Dikkat","Proje adını girin.");
            exit();
        }

        
        $ModelProject = new ModelProject();
        $result = $ModelProject->addProject($post);

        if($result){
            echo $this->request->response("success","İşlem Başarılı","Proje bilgileri başarıyla eklendi.",["redirect"=>requestLink("project")]);
            exit();
        }else{
            echo $this->request->response("error","Ops! Dikkat","Beklenmedik bir hata meydana geldi. Lütfen sayfayı yenileyip tekrar deneyin.");
            exit();
        }


    }

    // GET
    public function update($id){
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $ModelProject = new ModelProject();
        $data['project'] = $ModelProject->getproject($id);

        $ModelCustomer = new ModelCustomer();
        $data['customers'] = $ModelCustomer->getAllCustomers();

        echo $this->view->load("project/update",$data);
    }

    public function updateProject()
    {
        $post = $this->request->post();

        if(isEmpty($post["project_id"])){
            echo $this->request->response("error","Ops! Dikkat","Proje bulunamadı.");
        }

        $ModelProject = new ModelProject();
        $results = $ModelProject->updateProject($post);

        if($results){
            echo $this->request->response("success","Başarılı!","Proje başarıyla güncellendi.",["redirect" =>  requestLink("project")]);
        }
        else{
            echo $this->request->response("error","Ops! Dikkat","Proje Güncellenirken bir hata oluştu.");
        }
    }

    public function delete(){

        $post = $this->request->post();

        $ModelProject = new ModelProject();
        $results  = $ModelProject->deleteProject($post);

       if($results){
        echo $this->request->response("success","Başarılı!","Proje başarıyla Silindi.",["redirect" =>  requestLink("project")]);
       }
       else{
        echo $this->request->response("error","Ops! Dikkat","Proje Güncellenirken bir hata oluştu.");
       }
    }




}
