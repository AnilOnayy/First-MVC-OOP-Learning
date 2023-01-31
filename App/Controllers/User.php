<?php 

namespace App\Controllers;

use Core\BaseController;
use Core\Session;


class User extends BaseController
{

    public function setSession($name,$val){
        Session::setSession($name,$val);
    
    }
    public function getSession($name){
        return Session::getSession($name);
    }


    public function showProfile($id){
        $user = $this->db->getRow("SELECT * FROM members WHERE MemberID=?",[$id]);
        print_r($user);
    }

    public function test(){
        $this->view->load("test",['isim'=>"Anıl"]);
    }
    public function getTest(){
        $get = $this->request->post();
        print_r($get);
    }

    

}


?>