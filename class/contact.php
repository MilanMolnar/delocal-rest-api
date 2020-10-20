<?php
class Contact{

    // Connection
    private $conn;

    // Table
    private $db_table;

    // Columns
    public $id;
    public $name;
    public $email;
    public $address;
    public $phone;

    // Db connection
    public function __construct($db){
        $this->conn = $db;
        $this->db_table =  $_ENV["DATA_TABLE"];
    }

    // GET ALL
    public function show(){
        $sqlQuery = "SELECT id, name, email, address, phone FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function store(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                     SET
                        name = :name,   
                        email = :email, 
                        address = :address, 
                        phone = :phone
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone", $this->phone);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // GET one
    public function showOne(){
        $sqlQuery = "SELECT
                        id, 
                        name, 
                        email, 
                        address, 
                        phone
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                       LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->address = $dataRow['address'];
        $this->phone = $dataRow['phone'];
    }

    // UPDATE
    public function update(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        phone = :phone, 
                        address = :address
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}
?>