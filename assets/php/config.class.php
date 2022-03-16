<?php

class Database
{

    const USERNAME = 'ghermaico135@gmail.com'; 
    const PASSWORD = 'herriyedarling@2021';
    
    private $dsn = "mysql:host=localhost;dbname=db_user_system";
    private $dbUser = "root";
    private $dbPass = "";

    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->dbUser, $this->dbPass);
            // echo "connected Successfully to Database";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage;
        }

        return $this->conn;
    }

    //remove all the special characters
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

//Dynamic Error or Success message
    public function showMessage($type, $message)
    {
        return '<div class="alert alert-' . $type . ' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"> &times;</button>
                    <strong class="text-center"> ' . $message . '</strong>
                </div>';
    }

}

// $obj = new Database();
