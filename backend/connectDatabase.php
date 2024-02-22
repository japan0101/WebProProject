<?php
class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $res;
    public function __construct()
    {
        $this->hostname = "localhost";
        $this->username = "bess1123";
        $this->password = "123456789";
        $this->database = "test";
    }

    public function custom(string $sql)
    {
        $this->query($sql);
    }

    public function insert(string $tablename, array $keyvalue)
    {
        $column = "";
        $value = "";

        foreach($keyvalue as $key => $value){
            $column += ", ".$key;
            $value += ", ".$value;
        }
        $column = str_replace(", ", "", $column, 1);
        $value = str_replace(", ", "", $value, 1);
        $sql = "INSERT INTO $tablename ($column) VALUE ($value)";
        echo $sql;
        $this->query($sql);
    }

    public function update(string $tablename, array $keyvalue, array $where)
    {
        $data = "";
        $sql = "UPDATE $tablename SET ";
        foreach ($keyvalue as $key => $value) {
            $data = ", $key = $value";
        }
        $data = str_replace(", ", "", $data, 1);
        $sql += $data + " WHERE ";

        $data = "";
        foreach($where as $key => $value){
            $data += ", $key = $value";
        }
        $data = str_replace(", ", "", $data, 1);
        $sql += $data;
        $this->query($sql);
    }

    public function delete(string $tablename, $col = "", $where)
    {
        $sql = "DELETE $col FROM $tablename WHERE $where";
        $this->query($sql);
    }

    private function query(string $sql)
    {
        try {
            $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
            $result = $conn->query($sql);
            $this->res = array("payload"=>[], "result" => 0, "message"=>'');

            if (str_starts_with($sql, "SELECT")) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_object())
                        array_push($this->res['payload'], $row);
                    $this->res['result'] = 1;
                    $this->res['message'] = "Successful";
                } else {
                    $this->res['result'] = 0;
                    $this->res['message'] = "No Data";
                }
            }else{
                if ($result){
                    $this->res['result'] = 1;
                    $this->res['message'] = "Successful";
                }else{
                    $this->res['result'] = 0;
                    $this->res['message'] = "Cannot Query: ".$conn->error;
                }
            }

        } catch (Exception $e) {
            $this->res = array(
                'result' => -1,
                'message' => 'Connection failed: ' . $e->getMessage()
            );
        }
    }

    public function getResult()
    {
        return $this->res;
    }
}
$database = new Database();
