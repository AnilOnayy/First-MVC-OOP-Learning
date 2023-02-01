<?php 

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelHome;
use App\Model\ModelProject;
use Core\BaseController;
use Core\Session;

class Home extends  BaseController
{

    public function index(){


     
        $data['navbar'] = $this->view->load("static/navbar");
        $data['sidebar'] = $this->view->load("static/sidebar");

        $ModelHome = new ModelHome();
        $ModelProject = new ModelProject();
        $ModelCustomer = new ModelCustomer();

        $data["customer_count"] = $ModelHome->countCustomers();
        $data["project_count"] = $ModelHome->countProjects();
        $data["systemUser_count"] = $ModelHome->countSystemUsers();
        $data["resumingProjects_count"] = $ModelHome->resumingProjects();
        $data["completedProjects_count"] = $ModelHome->completedProjects();

        $data["projects_table"] = $ModelProject->getAllProjects();
        $data["customers_table"] = $ModelCustomer->getAllCustomers();

        echo $this->view->load("home/index",$data);
    }
}

?>