<?php

class Database {
    public $res;
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct() {
        $this->hostname = "127.0.0.1";
        $this->username = "bess1123";
        $this->password = "123456789";
        $this->database = "laewtaeapp";
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }

    public function custom(string $sql) {
        $this->query($sql);
    }

    private function query(string $sql) {
        try {
            $result = $this->conn->query($sql);
            $this->res = array("payload" => array(), "result" => 0, "message" => 'Default', "type" => "");
            // payload  = ข้อมูลที่เราดึง
            // result   = บอก true, false
            // message  = บอกข้อความว่าเกิดอะไรขึ้น
            // type     = บอกว่าใช้กับอะไร

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
            } else {
                if ($result) {
                    $this->res['result'] = 1;
                    $this->res['message'] = "Successful";
                } else {
                    $this->res['result'] = 0;
                    $this->res['message'] = "Cannot Query: " . $this->conn->error;
                }
            }
        }
        catch (Exception $e) {
            $this->res = array(
                'result' => 0,
                'message' => 'Connection failed: ' . $e->getMessage()
            );
        }
    }

    public function insert(string $tablename, array $keyvalue) {
        $column = implode(", ", array_keys($keyvalue));
        $value = implode("', '", array_values($keyvalue));

        $sql = "INSERT INTO $tablename ($column) VALUE ('$value')";
        $this->query($sql);
    }

    public function update(string $tablename, array $keyvalue, string $where = null) {
        $data = "";
        $sql = "UPDATE $tablename SET ";
        foreach ($keyvalue as $key => $value) {
            $data .= ", $key = '{$value}'";
        }
        $data = substr($data, 2, strlen($data));
        $sql .= $data;

        if (!is_null($where)) {
            $sql .= " WHERE " . $where;
        }
        $this->query($sql);
    }

    public function delete(string $tablename, $col = null, $where = null) {
        if (!is_null($col))
            $sql = "DELETE $col FROM $tablename";
        else $sql = "DELETE FROM $tablename";
        if (!is_null($where))
            $sql .= " WHERE $where";
        $this->query($sql);
    }

    public function customResult(int $result = null, string $message = null, string $type = null) {
        if (!is_null($result) || !isset($this->res['result']))
            $this->res['result'] = is_null($result) ? 0 : $result;
        if (!is_null($message) || !isset($this->res['message']))
            $this->res['message'] = is_null($message) ? "Default" : $message;
        if (!is_null($type) || !isset($this->res['type']))
            $this->res['type'] = is_null($type) ? "" : $type;
    }

    public function getResult() {
        return $this->res;
    }
}

header('Content-Type: text/html; charset=utf-8');
$database = new Database();
