<?php 
    class Page{
        private $conn;

        public $pageid;
        public $pagetitle;
        public $pageurl;

          // Db connection
          public function __construct($db){
            $this->conn = $db;
        }

        public function getpage(){
            $sql = "SELECT title , url WHERE id = '?'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->pageid);
            $stmt->execute();
            $result = $stmt->FETCH_ASSOC(PDO::FETCH_ASSOC);

            $this->pagetitle = $result['title'];
            $this->pageurl = $result['url'];

        }
    }
?>
