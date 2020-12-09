<?php
class Member{
    // database connection and table name
    private $conn;
    private $table_name = "member";

    // object properties
    public $UserID;
    public $fname;
    public $login;
    public $lname;
    public $phonenum;
    public $email;
    public $address;
    public $password;
    public $cpassword;
    public $role;
    public $datecreated;
    public $errEmail;
    public $errPass;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){
        if($this->emailAlreadyExist()){
            $this->errEmail = true;
            return false;
        }
        if ($this->password != $this->cpassword){
            $this->errPass = true;
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    fname=:fname, lname=:lname, phonenum=:phonenum, email=:email, address=:address, password=:password, role=:role, datecreated=:datecreated";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fname=htmlspecialchars(strip_tags($this->fname));
        $this->lname=htmlspecialchars(strip_tags($this->lname));
        $this->phonenum=htmlspecialchars(strip_tags($this->phonenum));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->datecreated=htmlspecialchars(strip_tags($this->datecreated));

        // bind values
        $stmt->bindParam(":fname", $this->fname);
        $stmt->bindParam(":lname", $this->lname);
        $stmt->bindParam(":phonenum", $this->phonenum);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":datecreated", $this->datecreated);

        // execute query
        if($stmt->execute()){
            $this->UserID = $this->conn->lastInsertId();
            return true;
        }else{
            return false;
        }
    }
    // login user
    function login(){
        //Select all Query
        $query = "SELECT
                    `UserID`,`fname`, `lname`, `phonenum`, `email`, `address`, `password`, `role`, `datecreated`
                FROM
                    " . $this->table_name . " 
                WHERE
                    (email='".$this->login."') AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function member(){
        //Select all Query
        $query = "SELECT `UserID`, `email`, `password`,`role`,`datecreated`,
                    FROM  . $this->table_name . ";

         // prepare query statement
         $stmt = $this->conn->prepare($query);
         // execute query
         $stmt->execute();
         return $stmt;

    }
    function allmembers(){
        //Select all Query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function countmembers(){
        
    }

    //Validation Functions
    function emailAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                email='".$this->email."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>