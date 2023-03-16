<?php
error_reporting(E_ERROR | E_PARSE);

    class User{
        // Connection
        private $conn;
        // Table
        private $db_table = "user";
        // Columns
        public $id;
        public $password;
        public $name;
        public $department_id;
        public $active;
        public $role_id;
        public $alluser;
        public $never;
        public $onlineuser;
        public $rectime;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // Login 
        // public function login($uid,$password){
        //     $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE id = '$uid' AND password = 'md5($password)'";
        //     $stmt = $this->conn->prepare($sqlQuery);
        //     $stmt->execute();
        //     return $stmt;
        // }

        // CREATE
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        id = :id,
                        name = :name, 
                        password = :password,               
                        department_id = :department_id, 
                        role_id = :role_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->password=md5(htmlspecialchars(strip_tags($this->password)));
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->department_id=htmlspecialchars(strip_tags($this->department_id));
            $this->role_id=htmlspecialchars(strip_tags($this->role_id));
            //$this->created=htmlspecialchars(strip_tags($this->created));
        
            // bind data
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":department_id", $this->department_id);
            $stmt->bindParam(":role_id", $this->role_id);
            //$stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleEmployee(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        password, 
                        department_id, 
                        role_id
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                       AND
                       password = md5(?)
                       
                      
            
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->bindParam(2, $this->password);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->id = $dataRow['id'];
            $this->name = $dataRow['name'];
            $this->password = $dataRow['password'];
            $this->department_id = $dataRow['department_id'];
            $this->role_id = $dataRow['role_id'];
        }        
        // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET                    
                        name = :name, 
                        password = :password,               
                        department_id = :department_id, 
                        role_id = :role_id
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->department_id=htmlspecialchars(strip_tags($this->department_id));
            $this->role_id=htmlspecialchars(strip_tags($this->role_id));            
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":department_id", $this->department_id);
            $stmt->bindParam(":role_id", $this->role_id);            
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteEmployee(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // getuser detail cbt
        public function countuser(){
            $sqlQuery = "SELECT
                        count(id)  as 'alluser'                       
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    department_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->department_id);
            
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->alluser = $dataRow['alluser'];          
        }        
        public function neverLogin(){
            $sqlQuery = "SELECT
                        count(id)  as 'never'                       
                      FROM
                        ". $this->db_table ."
                    WHERE 
                    department_id = ?
                    
                    AND   YEAR(last_login) = YEAR(CURRENT_DATE());";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->department_id);
            
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->never = $dataRow['never'];          
        }  


        // online

        public function onlineuser(){
           
           $sqlQuery = "SELECT user.id,`name`,
            SEC_TO_TIME(sum(cbt.time_record)) as rectime,
            date(last_login) as 'onlineuser' 
            FROM `user`
            INNER JOIN cbt ON cbt.user_id = user.id
            WHERE date(last_login) = CURDATE() 
            AND
            date(cbt.record_date)=CURDATE() 
            AND
            active = 1
            AND 
            department_id = ?
            GROUP BY user.id;";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->department_id);
            
            $stmt->execute();
            return $stmt;
            // $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // $this->id = $dataRow['user.id'];          
        }  
    }
?>