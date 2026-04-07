<?php
require("../../db/connect.php");
session_start();

$email=!empty($_POST["email"])? trim($_POST["email"]): '';
$pass=!empty($_POST["pass"])? trim($_POST["pass"]): '';
$error=[];

if($email===''){
    $error["email"]="Email kiritilmagan";
}else{
    $sql="SELECT * FROM users WHERE email LIKE :email";
    $stmt=$conn->prepare($sql);
    $stmt->execute([
        ":email"=>$email
    ]);
    $admin=$stmt->fetch();
   
   if($admin==false){
    $error["admin"]="Bunday foydalanuvchi mavjud emas";
   }else{

     if(hash('md5',$pass)==$admin["password"]){
            $_SESSION["user_id"]=$admin["id"];
            header("Location:../index.php");
     }else{
        $error["password_error"]="Parol xato!";
     }
   }
  

}
// var_dump(hash('md5',$pass)==$admin["password"]);
if(count($error)>0){
    $_SESSION["errors"]=$error;
    header("Location:login.php");
}





?>