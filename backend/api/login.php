<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/user.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new User($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->password = isset($_GET['password']) ? $_GET['password'] : die();
  
    $item->getSingleEmployee();
    if($item->name != null){
        // create array
        session_start();
        $_SESSION["depid"]= $item->department_id;
        $emp_arr = array(
            "id" =>  $item->id,
            "name" => $item->name,
            "department_id" => $item->department_id,
            "role_id" => $item->role_id
            
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
       // http_response_code(404);
        echo 0;
    }
?>