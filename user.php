<?php
       include "crud.php"; 
       include_once "DBConnector.php";

       class  User implements Crud
       {
           private $con;
           private $user_id;
           private $first_name;
           private $last_name;
           private $city_name;

           function __construct($first_name,$last_name,$city_name){
               $this->first_name=$first_name;
               $this->last_name=$last_name;
               $this->city_name=$city_name;
           }
        

           public function setUserId($user_id){
               $this->user_id=user_id;
           }
           public function getUserId(){
               return $this->user_id;
           }
           public function save(){
               $this->DBConnect();

               $fn=$this->first_name;
               $ln=$this->last_name;
               $city=$this->city_name;
               $res=mysqli_query($this->con->conn,"INSERT into user(first_name,last_name,user_city) VALUES ('$fn','$ln','$city')") or die("Error:".mysql_error());
               
               $this->DBClose();
               return $res;
           }
           public function DBConnect(){
               $this->con = new DBConnector;
           }
           public function DBClose(){
               $this->con->closeDatabase();
           }
           public function readAll(){
                $this->DBConnect();
                $res=mysqli_query($this->con->conn, "SELECT * FROM user" or die("Error:" . mysqli_error($this->con->conn)));
                
                $this->DBClose();
                return $res;
           }
           public function readUnique(){
            return null;
           }
           public function search(){
            return null;
           }
           public function update(){
            return null;
           }
           public function removeOne(){
            return null;
           }
           public function removeAll(){
            return null;
           }

       }
       
?>