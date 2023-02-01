<?php 

namespace App\Model;

use Core\BaseModel;

class ModelHome extends BaseModel
{
    public function countCustomers(){
        return $this->db->getColumn("SELECT count(*) as total FROM customers");
    }

    public function countProjects(){
        return $this->db->getColumn("SELECT count(*) as total FROM projects");
    }

    public function countSystemUsers(){
        return $this->db->getColumn("SELECT count(*) as total FROM users");
    }


    public function resumingProjects(){
        return $this->db->getColumn("SELECT count(*) as total FROM projects WHERE `status`='a' ");
    }

    public function completedProjects(){
        return $this->db->getColumn("SELECT count(*) as total FROM projects WHERE `status`='p' ");
    }

}