<?php 

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelAuth extends BaseModel
{
    public function userLogin($data){

        $email = $data["email"];
        $password = md5($data["password"]);

        $user = $this->db->getRow("SELECT * FROM users WHERE users.email=? AND users.password=? ",array($email,$password));
    
        if($user){
            Session::setSession("user_login",true);
            Session::setSession("user_id",$user->id);
            Session::setSession("name",$user->name);
            Session::setSession("surname",$user->surname);
            Session::setSession("email",$user->email);
            Session::setSession("password",$user->password);

            return true;
        }
        else{
            return false;
        }
    }
}
