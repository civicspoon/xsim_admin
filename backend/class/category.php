<?php 
    class Category{
        private $conn;

        public $cate_id;
        public $cate_code;
        public $cate_name;
 

          // Db connection
          public function __construct($db){
            $this->conn = $db;
        }

        public function getallcate(){
            $sql = "SELECT * FROM category_rev1 ORDER BY sort";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt;

        }
    }
?>