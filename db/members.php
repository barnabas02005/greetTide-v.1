<?php
      class mem {
            private $id;
            private $name;
            private $email;
            private $loginStatus;
            private $lastLogin;
            private $dbConn;

            function setId($id) {$this->id = $id;}
            function getId() { return $this->id;}
            function setName($name) {$this->name = $name;}
            function getName() {return $this->name;}
            function setEmail($email) {$this->email = $email;}
            function getEmail() { return $this-> email;}
            function setLoginStatus($loginStatus) { $this->loginStatus = $loginStatus;}
            function getLoginStatus() {return $this->loginStatus;}
            function setLastLogin($lastLogin) {$this->lastLogin = $lastLogin;}
            function getLastLogin() {return $this->lastLogin;}

            public function __construct() {
                  require_once("Dbconnect.php");
                  $db = new DbConnect();
                  $this->dbConn = $db->connect();
            }

            public function save()
            {
                  $sql = "INSERT INTO `member` (`id`, `name`, `email`, `login_status`, `last_login`) VALUES(null, :name, :email, :loginStatus, :lastLogin)";
                  $stmt = $this->dbConn->prepare($sql);
                  $stmt->bindParam(":name", $this->name);
                  $stmt->bindParam(":email", $this->email);
                  $stmt->bindParam(":loginStatus", $this->loginStatus);
                  $stmt->bindParam(":lastLogin", $this->lastLogin);

                  try {
                        if($stmt->execute())
                        {
                              return true;
                        }
                        else
                        {
                              return false;
                        }
                  }
                  catch (Exception $e)
                  {
                        echo $e->getMessage();
                  }
            }


            public function getMemByEmail() {
                  $stmt = $this->dbConn->prepare("SELECT * FROM member WHERE email = :email");
                  $stmt->bindParam(":email", $this->email);
                  try
                  {
                        if($stmt->execute())
                        {
                              $member = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                  }
                  catch (Exception $e)
                  {
                        echo $e->getMessage();
                  }
                  return $member;
            }

            public function updateLoginStatus() {
                  $stmt = $this->dbConn->prepare("UPDATE member SET login_status = :loginStatus, last_login = :lastLogin WHERE id= :id");
                  $stmt->bindParam(":loginStatus", $this->loginStatus);
                  $stmt->bindParam(":lastLogin", $this->lastLogin);
                  $stmt->bindParam(":id", $this->id);

                  try 
                  {
                        if($stmt->execute())
                        {
                              return true;
                        }
                        else
                        {
                              return false;
                        }
                  }
                  catch (Exception $e)
                  {
                        echo $e->getMessage();
                  }
            }
      }