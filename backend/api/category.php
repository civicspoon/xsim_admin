<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/category.php';

    $database = new Database();
    $db = $database->getConnection();
    $category = new Category($db);

  
    $stmt = $category->getallcate();
    $categoryCount = $stmt->rowCount();

//  echo json_encode($categoryCount);
if($categoryCount > 0){
    
    
    $employeeArr = array();
 //   $employeeArr["categoryCount"] = $categoryCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "code" => $code,
            "name" => $name
            
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