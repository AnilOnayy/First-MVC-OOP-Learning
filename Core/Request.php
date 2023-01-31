<?php

namespace Core;

class Request
{
 
    public function get(){
        return self::filter($_GET);
    }

    public function post(){
        return self::filter($_POST);
    }

    public function response($status,$title,$msg,$data=[]){
        return json_encode(['status' => $status , 'title' => $title , 'msg' => $msg ,'data' => $data],JSON_UNESCAPED_UNICODE);
      
    }

    public static function filter($data){ 
        return is_array($data) ? array_map("\Core\Request::filter",$data) : htmlspecialchars(addslashes(trim($data)));
    }
}