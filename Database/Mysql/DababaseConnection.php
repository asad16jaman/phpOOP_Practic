<?php

namespace Database\Mysql;

class DababaseConnection{
    private $password = "asad-123";
    private $username = "root";
    public $conn = false;

    public function connect(string $username, string $password){
        if($this->username==$username && $this->password==$password){
            $this->conn = true;
        }
    }

}