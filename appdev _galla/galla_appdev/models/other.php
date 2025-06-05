<?php
    class Post {
        private $pdo;
        public function __construct(\PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function postEmployee($data){
            $sql = "INSERT INTO employee(employeeid, firstname, fullname) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            try{
                $stmt->execute([$data->employeeid, $data->fullname]);
                return array("data"=>[], "message"=>"Successfully inserted record.");
            }
            catch(\PDOException $e){
                http_response_code(401);
                return array("message"=>$e->getMessage());
            }
            return "Failed to insert.";
        }
       
    }


?>