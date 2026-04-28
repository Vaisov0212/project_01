<?php

require("../../db/connect.php");
session_start();
$u_id=$_SESSION["user_id"];
$sql="SELECT password FROM users WHERE id=$u_id";
$stmt=$conn->prepare($sql);
$stmt->execute();
$pass=$stmt->fetch();

$old_pass=!empty($_POST['old_pass'])? trim($_POST["old_pass"]): "";
$new_pass=!empty($_POST['new_pass'])? trim($_POST["new_pass"]): "";
$confirm_pass=!empty($_POST['confirm_pass'])? trim($_POST["confirm_pass"]): "";

if($old_pass=="" || $new_pass=="" || $confirm_pass=="" || $new_pass!=$confirm_pass){
 
    $_SESSION["pass_err"]="Malumotlar toldirilmagan yoki birxil parol kiritilmagan";
    header("Location:settings.php");
}
else{
      $hash_old_pass=md5($old_pass);
         if($hash_old_pass==$pass["password"] && strlen($new_pass)>=8 ){
            $new_pass_hash=md5($new_pass);
            $sql="UPDATE users SET password=:password";
            $stmt=$conn->prepare($sql);
            $stmt->execute([
                ':password'=>$new_pass_hash
            ]);
                $_SESSION["pass_messgae"]="Malumotlar yangilandi";
                 header("Location:settings.php");
         }
         else{
            $_SESSION["pass_err"]="avvalgi parol tasdiqlanmadi yoki yangi parol uzunligi 8 ta belgidan kam";
            header("Location:settings.php");
         }

}





?>