<?php
       include "crud.php"; 
       include "authenticate.php";//added in lab 2
       include_once "DBConnector.php";


       class  User implements crud
       {
           private $con;
           private $user_id;
           private $first_name;
           private $last_name;
           private $city_name;

           //lab 2 part 2
           private $username;
           private $password;
        

           public function create(){
            $reflection =new ReflectionClass('User');
            $instance= $reflection->newInstanceWithoutConstructor();
            return $instance;
        }

           function __construct($first_name,$last_name,$city_name,$username,$password){
               $this->first_name=$first_name;
               $this->last_name=$last_name;
               $this->city_name=$city_name;
               $this->username=$username;
               $this->password=$password;
           }

         
        
           public function setUsername($username){
               $this->username=$username;
           }
           public function getUsername(){
               return $this->username;
           }
           public function setPassword($password){
               $this->password=$password;
           }
           public function getPassword(){
               return $this->password;
           }

           public function setUserId($user_id){
               $this->user_id=user_id;
           }
           public function getUserId(){
               return $this->user_id;
           }
           public function isUserExists(){
                $found=false;
                $this->DBConnect();//connecting to the database
                $sql="SELECT * FROM user ";//query to select the usernames from the dbase
                $result=mysqli_query($this->con->conn,$sql);//executing the database selection
                while($rows=mysqli_fetch_assoc($result)){
                        if($rows['username']==$this->getUsername()){
                            $found=true;
                            break;
                        }
                  }
                $this->DBClose();
                return $found;
           } 
           public function save(){
               $this->DBConnect();

               $fn=$this->first_name;
               $ln=$this->last_name;
               $city=$this->city_name;
               $uname=$this->username;
               $pass=$this->password;

               $res=mysqli_query($this->con->conn,"INSERT into user(first_name,last_name,user_city,username,password) 
                                                        VALUES ('$fn','$ln','$city','$uname','$pass')") or die("Error:");
              
               
               
               $this->DBClose();
               return $res;
           }

           public function DBConnect(){
               $this->con = new DBConnector;
           }
           public function DBClose(){
               $this->con->closeDatabase();
           }
           public function hashPassword(){
               $this->password=password_hash($this->password,PASSWORD_DEFAULT);
           }
           public function isPasswordCorrect(){
               $this->DBConnect();
               $found=false;
               $result=mysqli_query($this->con->conn," SELECT username,password FROM user ") or die("Error ");
               if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["password"]== $this->getPassword()&& $row["username"]==$this->getUsername()){
                        $found=true;
                    }else{
                        echo"not found";
                    }
                }
              } else {
                echo "0 results";
              }
           
               $this->DBClose();
               return $found;
           }
           public function login(){
               if($this->isPasswordCorrect()){
                   echo ("im working");
                   header("Location:private_page.php");
               }
           }
           public function createUserSession(){
               session_start();
               $_SESSION['username']=$this->getUsername();
           }
           public function logout(){
               session_start();
               unset($_SESSION['username']);
               session_destroy();
               header("Location:lab1.php");
           }
           public function readAll(){
               $this->DBConnect();
               $sql="SELECT first_name,last_name,user_city,username FROM user ";//query to select details
               $result=mysqli_query($this->con->conn,$sql);//getting the query executed;
               $this->DBClose();
               return $result;
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

           //lab 2 additions
           public function validateForm(){
               $fn=$this->first_name;
               $ln=$this->last_name;
               $cn=$this->city_name;
               if($fn==""||$ln==""||$cn==""){
                   return false;
               }
               return true;
           }
           public function validateFormErrorSessions(){
               session_start();
               $_SESSION['form_errors']="All fields are required";
           }

       }
       
?>