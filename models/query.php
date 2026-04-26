<?php
require_once 'db.php';
class query extends db{

    public function getDb(){
      return Db::getInstance();
    }
    

//    public function LoginAdmin($mail, $password){
//        $dbh = $this->getDb();
//        $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :mail, pwd = :pwd ');
//        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
//        $stmt->bindValue(':pwd', $password, PDO::PARAM_STR);
//        $stmt->execute();
//        $users = $stmt->rowCount();
//        if ($users == 1) {
//            $_SESSION['connected'] = true;
//            $_SESSION['rank'] = $users[0]['rank'];
//            if($_SESSION['rank'] == 'Admin'){
//                session_start();
//                header('Location:/admin/');
//            }
//            header('Location:index.php');
//        }
//    }

   
    
    public function select($col, $table){
        $dbh = $this->getDb();
        $query = "SELECT $col FROM $table";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
//SELECT FROM WHERE
    public function selectWithID($col, $table, $details){
        $dbh = $this->getDb();
        $query = "SELECT $col FROM $table WHERE $details";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
// SELECT FROM
    public function selectAll($col, $table){
        $dbh = $this->getDb();
        $query = "SELECT $col FROM $table";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function insert($table, $col = array(), $new = array()){
        $dbh = $this->getDb();
        $new = "'".implode("','",$new)."'";
        $col = implode(", ", $col);
        $query = "INSERT INTO $table ($col) VALUES($new)";
        $stmt = $dbh->prepare($query);
        $stmt->execute();

    }
    public function delete($table, $id){
        $dbh = $this->getDb();
        $query = "DELETE FROM $table WHERE id = $id";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }
    public function update($table, $col = array(), $new = array(), $id){
        $dbh = $this->getDb();
        for($i=0; $i < sizeof($col); $i++){
            $query = "UPDATE $table SET $col[$i] = $new[$i] WHERE id = $id";
            $stmt = $dbh->prepare($query);
            $stmt->execute();
        }
    }
    public function verif($tableau,$valeur){
          $dbh = $this->getDb();
         $query = "Select * from $tableau where  $valeur";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
         $verif = $stmt->rowCount();
        return $verif;
    }
    
}