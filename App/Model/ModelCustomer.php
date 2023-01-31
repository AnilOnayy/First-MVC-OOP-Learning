<?php 

namespace App\Model;

use Core\BaseModel;

class ModelCustomer extends BaseModel
{
    public function getAllCustomers(){
        return $this->db->getRows("SELECT * FROM customers");
    }
    public function getCustomer($id){
        return $this->db->getRow("SELECT * FROM customers WHERE customer_id=?",[$id]);
    }

    public function addCustomer($post){

        $insert_id = $this->db->insert("INSERT INTO customers  SET
            customer_name=:customer_name,
            customer_surname=:customer_surname,
            customer_company=:customer_company,
            customer_address=:customer_address,
            customer_phone=:customer_phone,
            customer_gsm=:customer_gsm,
            customer_email=:customer_email
        ",array(
            "customer_name" => $post["customer_name"],
            "customer_surname" => $post["customer_surname"],
            "customer_company" => $post["customer_company"],
            "customer_address" => $post["customer_address"],
            "customer_phone" => $post["customer_phone"],
            "customer_gsm" => $post["customer_gsm"],
            "customer_email" => $post["customer_email"]
        ));

        if($insert_id){
            return true;
        }else{
            return false;
        }



    }

    public function updateCustomer($post){

        $result = $this->db->update("UPDATE customers  SET
            customer_name=:customer_name,
            customer_surname=:customer_surname,
            customer_company=:customer_company,
            customer_address=:customer_address,
            customer_phone=:customer_phone,
            customer_gsm=:customer_gsm,
            customer_email=:customer_email

            WHERE customer_id = :customer_id
        ",array(
            "customer_name" => $post["customer_name"],
            "customer_surname" => $post["customer_surname"],
            "customer_company" => $post["customer_company"],
            "customer_address" => $post["customer_address"],
            "customer_phone" => $post["customer_phone"],
            "customer_gsm" => $post["customer_gsm"],
            "customer_email" => $post["customer_email"],
            "customer_id" => $post["customer_id"]
        ));

        return $result;
   
    }

    public function deleteCustomer($post){
        return $this->db->delete("DELETE FROM customers WHERE customer_id=?",[$post['customer_id']]);
    }




}