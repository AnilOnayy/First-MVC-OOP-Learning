<?php 

namespace App\Model;

use Core\BaseModel;

class ModelProject extends BaseModel
{
    public function getAllProjects(){
        return $this->db->getRows("SELECT * FROM projects ");
    }
    public function getProject($id){
        return $this->db->getRow("SELECT * FROM projects WHERE id=?",[$id]);
    }




    public function addProject($post){

        if(isEmpty($post["project_customer_id"])){
            $post["project_customer_id"] = 0;
        }
        $start_date = !$post["project_start_date"] ? date("Y-m-d") : $post["project_start_date"];
        $end_date = !$post["project_end_date"] ? date("Y-m-d") : $post["project_end_date"];
        $progress = !$post["project_progress"] ? 1 : $post["project_progress"];
        $status = !$post["project_status"] ? "p" : $post["project_status"];


        $insert_id = $this->db->insert("INSERT INTO projects  SET
            `title`=:project_title,
            `description`=:project_detail,
            `start_date`=:project_start_date,
            `end_date`=:project_end_date,
            `progress`=:project_progress,
            `status`=:project_status,
            `customer_id`=:project_customer_id,
            `added_id`  =:added_id
        ",array(
            "project_title" => $post["project_title"],
            "project_detail" => $post["project_detail"],
            "project_start_date" => $start_date,
            "project_end_date" => $end_date,
            "project_progress" => $progress,
            "project_status" => $status,
            "project_customer_id" => $post["project_customer_id"],
            "added_id" => $_SESSION["user_id"]
        ));

        return $insert_id;
    }

    public function updateProject($post){


        $start_date = !$post["project_start_date"] ? date("Y-m-d") : $post["project_start_date"];
        $end_date = !$post["project_end_date"] ? date("Y-m-d") : $post["project_end_date"];
        $progress = !$post["project_progress"] ? 1 : $post["project_progress"];
        $status = !$post["project_status"] ? "p" : $post["project_status"];

        $insert_id = $this->db->update("UPDATE projects  SET
            `title`=:project_title,
            `description`=:project_detail,
            `start_date`=:project_start_date,
            `end_date`=:project_end_date,
            `progress`=:project_progress,
            `status`=:project_status,
            `customer_id`=:project_customer_id

            WHERE id=:id
        ",array(
            "project_title" => $post["project_title"],
            "project_detail" => $post["project_detail"],
            "project_start_date" => $start_date,
            "project_end_date" => $end_date,
            "project_progress" => $progress,
            "project_status" => $status,
            "project_customer_id" => $post["project_customer_id"],
            "id" => $post["project_id"]
        ));

        return $insert_id;
   
    }

    public function deleteProject($post){
        return $this->db->delete("DELETE FROM projects WHERE id=?",[$post['project_id']]);
    }

}