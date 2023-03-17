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

    if(isset($_POST['duplicateuid'])){
        $log->uid = isset($_POST['duplicateuid']) ? $_POST['duplicateuid'] : die();
        $stmt = $log->duplicate_list();
        $countlog = $stmt->rowCount();
        if($countlog>0){
            $duplicate = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e =array(
                    "id" => $id,
                    "user_id"=>$user_id,
                    "record_date"=>$record_date,
                    "time_record"=>$time_record
                );
                array_push($duplicate,$e);
            }
            echo json_encode($duplicate);
        }
        else{
            echo '0';
        }

    }

    if(isset($_POST['CheckID'])){
        $id = array();
        $id = $_POST['CheckID'];
        $member = count($id);
        $countdelete = 0;
        // Loop delete trough array
        for($i=0;$i<$member;$i++){
            $log->uid = $id[$i];
            $stmt = $log->delete_record();
     
            $countdelete += (int)$stmt; // ++ data = record
           
        } echo $countdelete;
    }
