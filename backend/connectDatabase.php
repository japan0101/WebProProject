<?php
class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $res;
    public function __construct(){
        $this->hostname = "localhost";
        $this->username = "bess1123";
        $this->password = "123456789";
        $this->database = "test";
    }

    public function select($sql){
        $this->query($sql);
    }

    public function insert($tablename, $value){
        $sql = "INSERT INTO $tablename VALUE ($value)";
        $this->query($sql);
    }

    public function update($tablename, $keyvalue, $where){
        $sql = "UPDATE $tablename SET ";
        foreach ($keyvalue as $key => $value){
            $set = ", $key = $value";
        }
        $set = str_replace(", ", "", $set, 1);
        $sql += $set+" WHERE $where";
        $this->query($sql);
    }

    public function delete($tablename, $col="", $where){
        $sql = "DELETE $col FROM $tablename WHERE $where";
        $this->query($sql);
    }

    private function query($sql)
    {
        try{
            $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
            $this->res = $conn->query($sql);
        }catch(Exception $e){
            die("Database connection failed: ".$e->getMessage());
        }
    }

    public function getResult(){
        return $this->res;
    }
}
$database = new Database();