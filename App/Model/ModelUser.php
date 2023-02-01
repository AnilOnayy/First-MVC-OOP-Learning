<?php 

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelUser extends BaseModel
{
 

    public function getProfile(){

        $id = intval(Session::getSession("user_id"));

        $user = $this->db->getRow("SELECT * FROM members WHERE MemberID=?",[$id]);
        return $user;
    }

    public function editProfile($post){
        $name = $post["name"];
        $surname = $post["surname"];
        $email = $post["email"];
        $id = Session::getSession("user_id");


        Session::setSession("name",$name);
        Session::setSession("surname",$surname);
        Session::setSession("email",$email);

        return $this->db->update("UPDATE users SET `name`=?,`surname`=?,`email`=? WHERE id=?",[$name,$surname,$email,$id]);
    }


    public function changePassword($post){

        $id = Session::getSession("user_id");
        $password = md5($post["newPassword"]);

        Session::setSession("password",$password);


        return $this->db->update("UPDATE users SET `password`=? WHERE id=?",[$password,$id]);
    }

}