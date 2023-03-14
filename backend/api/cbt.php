<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/cbt.php';

    $database = new Database();
    $db = $database->getConnection();
    $log = new CBT($db);

    if(isset($_GET['cbtlog'])){
        $log->department_id = isset($_GET['department_id']) ? $_GET['department_id'] : die();
        $log->year = isset($_GET['year']) ? $_GET['year'] : die();
        $log->limit = isset($_GET['limit']) ? $_GET['limit'] : die();
        $log->offest = isset($_GET['offest']) ? $_GET['offest'] : die();

        $stmt = $log->cbt_list();
        $usercount = $stmt->rowCount();
       // echo $usercount;

        if($usercount>0){
            $cbt_log = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array(
                    "id" =>$id,
                    "name" => $name,
                    "sumtime" => $sumtime
                );
                array_push($cbt_log, $e);
            }
            echo json_encode(($cbt_log));
        }

      
    }
