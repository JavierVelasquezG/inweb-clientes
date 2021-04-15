<?php

class DataBase {
    private $conn;

    public function __construct () {
        
        try {

            mysqli_report(MYSQLI_REPORT_STRICT);

            $this->conn = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        } catch (Exception $e) {

            die('Conexion fallida: ' . $e->getMessage());

        }

    }

    public function insert ($table, $columns, $data) {

        $data_string = '';

        for ($i = 0; $i < count($data); $i++) {
            if ($i + 1 == count($data)) {
                $data_string .= "'" . strval($data[$i]) . "'";
            } else {
                $data_string .= "'" . strval($data[$i]) . "', ";
            }
        }

        $columns_string = '';

        for ($i = 0; $i < count($columns); $i++) {
            if ($i + 1 == count($columns)) {
                $columns_string .= strval($columns[$i]);
            } else {
                $columns_string .= strval($columns[$i]) . ', ';
            }
        }

        $sql = "INSERT INTO $table ($columns_string) VALUES($data_string)";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {

            throw new Exception($this->conn->error, $this->conn->errno);

        }
    }

    public function delete ($table, $id) {
        $sql = "DELETE FROM $table WHERE ID = $id";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {

            throw new Exception($this->conn->error, $this->conn->errno);
            
        }
    }

    public function select ($table, $columns, $where_campo, $where_data) {

        $columns_string = '';

        if (is_array($columns)) {
            for ($i = 0; $i < count($columns); $i++) {
                if ($i + 1 == count($columns)) {
                    $columns_string .= strval($columns[$i]);
                } else {
                    $columns_string .= strval($columns[$i]) . ', ';
                }
            }
        } else {
            $columns_string = $columns;
        }

        $sql = "SELECT $columns_string FROM $table WHERE $where_campo = '$where_data'";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {

            throw new Exception($this->conn->error, $this->conn->errno);
            
        }
    }

    public function selectAll ($table) {
        $sql = "SELECT * FROM $table";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {

            throw new Exception($this->conn->error, $this->conn->errno);

        }
    }

    public function update ($table, $columns, $values, $id) {
        if (!is_array($columns)) {
            $sql = "UPDATE $table SET $columns" . " = " . "'" . $values . "'";
            if ($values == "NULL") {
                $sql = "UPDATE $table SET $columns" . " = " . $values;
            }
        } else {
            $sql = "UPDATE $table SET ";

            for ($i = 0; $i < count($columns); $i++) {
                if ($i + 1 == count($columns)) {
                    $sql .= $columns[$i] . " = '" . $values[$i] . "'";
                } else {
                    $sql .= $columns[$i] . " = '" . $values[$i] . "', ";
                }
            }
        }
        
        $sql .= " WHERE ID = $id";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {

            throw new Exception($this->conn->error, $this->conn->errno);

        }

    }

    public function free ($sql) {
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            
            throw new Exception($this->conn->error, $this->conn->errno);

        }
    }
}

?>