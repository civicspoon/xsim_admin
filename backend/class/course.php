<?php 
    class Course{
        private $conn;

        public $courseid;
        public $coursecode;
        public $coursename;
        public $courseconfig;
        public $remark;

          // Db connection
          public function __construct($db){
            $this->conn = $db;
        }

        public function getallcourse(){
            $sql = "SELECT * FROM course 
            INNER JOIN course_type  ON course_type.id = course.course_type
            ORDER BY course_type";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            // $result = $stmt->FETCH_ASSOC(PDO::FETCH_ASSOC);

            // $this->courseid = $result['id'];
            // $this->coursecode = $result['code'];
            // $this->coursename = $result['name'];
            // $this->courseconfig = $result['config'];
            // $this->remark = $result['remark'];
            return $stmt;
        }

        public function getSingle(){
            $sql = "SELECT * FROM course 
            INNER JOIN course_type  ON course_type.id = course.course_type
            WHERE course.id = :cid
            ORDER BY course_type";
           
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":cid",$this->courseid, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }
    }
?>