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

    if (isset($_GET['countalluser'])){
        $item->department_id = isset($_GET['department_id']) ? $_GET['department_id'] : die();

    
        $item->countuser();
        if($item->alluser != null){
            // create array
            $emp_arr = array(
                "alluser" =>  $item->alluser
                
            );
            $item->neverLogin();
            $emp_arr['never'] =  $item->never;
            http_response_code(200);
            echo json_encode($emp_arr);
        }
        
        else{
        // http_response_code(404);
            echo 0;
        }
    }

    if(isset($_GET['onlineuser'])){
        $item->department_id = isset($_GET['department_id']) ? $_GET['department_id'] : die();
        $stmt = $item->onlineuser();
     $itemCount = $stmt->rowCount();

  //  echo json_encode($itemCount);
    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr = array();
     //   $employeeArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "rectime" => $rectime
            );
            array_push($employeeArr, $e);
        }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    };
        
    }
?>