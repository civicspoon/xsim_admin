<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/course.php';

    $database = new Database();
    $db = $database->getConnection();
    $course = new Course($db);

    // getall 
  if(isset($_GET['getall'])){
    $stmt = $course->getallcourse();
    $courseCount = $stmt->rowCount();

//  echo json_encode($courseCount);
if($courseCount > 0){
    
    
    $courseArr = array();
 //   $employeeArr["courseCount"] = $courseCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "course_type"=>$course
            ,"code" => $code,
            "name" => $name
            
        );
        array_push($courseArr, $e);
    }
    echo json_encode($courseArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
};
  }

  // get a course 


     if(isset($_GET['getid'])){
        $course->courseid = isset($_GET['getid']) ? $_GET['getid'] : die();

        $stmt = $course->getSingle();
    
        $courseCount = $stmt->rowCount();
    
    //  echo json_encode($courseCount);
    if($courseCount > 0){
        
        
        $courseArr = array();
     //   $employeeArr["courseCount"] = $courseCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "course_type"=>$course
                ,"code" => $code,
                "name" => $name
                
            );
            array_push($courseArr, $e);
        }
        echo json_encode($courseArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    };
      }