<?php 

require_once("./models/PdoModel.php");

class UsersModel extends PdoModel{

    public function getUserByName($name){
        $req ="SELECT * FROM users WHERE name = :name";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $row;


    }

    public function registerDB($name,$role, $password){

        $req="INSERT INTO users (name,role, password) VALUES (:name,:role, :password)";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":role", $role, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    }

    public function getUserInfo($name){

        $req= "SELECT * FROM users WHERE name = :name"; 
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;

    }

    public function isAccountValid($name, $password){

        $req = "SELECT password FROM users WHERE name = :name";
        $stmt = $this->setDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $passwordDB = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return password_verify($password, $passwordDB['password']);
    }

}