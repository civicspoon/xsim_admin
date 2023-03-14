<?php
error_reporting(E_ERROR | E_PARSE);

class CBT{
    private $conn;
    private $db_table = "cbt";

    public $department_id;
    public $year;
 
    public $name;
    public $sumtime;
    public $id;
    public $limit;
    public $offest;

  // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // list sum cbt hour
    public function cbt_list(){
        $sql = " SELECT user_id as id, user.name,SEC_TO_TIME(SUM(time_record))  as sumtime
        FROM ". $this->db_table ." 
        INNER JOIN user ON user.id = cbt.user_id 
        WHERE user.department_id = :depid 
        AND 
        YEAR(record_date) = :year
        GROUP BY user_id 
        ORDER BY SEC_TO_TIME(SUM(time_record)) DESC 
        LIMIT 20 OFFSET :offet ";

        $stmt = $this ->conn->prepare($sql);
        //$stmt->bind_param("iiii",$this->department_id, $this->year, $this->from_record,$this->record_count);
        $stmt->bindParam(":depid",$this->department_id);
        $stmt->bindParam(":year",$this->year);
       //  $stmt->bindParam(":limit",$this->limit, PDO::PARAM_INT);
         $stmt->bindParam(":offet",$this->offest, PDO::PARAM_INT);
        
        $stmt->execute();
        // $dataRow = $stmt ->fetch(PDO::FETCH_ASSOC);

        // $this->cbt_id = $dataRow['cbt.id'];
        // $this->name = $dataRow['user.name'];
        // $this->sumtime = $dataRow['sumtime'];
        return $stmt;
    }

}

