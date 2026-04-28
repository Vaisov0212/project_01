<?php

require("../../db/connect.php");
session_start();
$u_id=$_SESSION["user_id"];
$name=!empty($_POST['name'])? trim($_POST["name"]): "";
$email=!empty($_POST['email'])? trim($_POST["email"]): "";


if($name=="" || $email==""){
 
    $_SESSION["settings_err"]="Malumotlar toldirilmagan";
    header("Location:settings.php");
}
else{
        $sql="UPDATE users SET name=:name, email=:email WHERE id=:id " ;
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ':name'=>$name,
            ':email'=>$email,
            ':id'=>$u_id
        ]);
         
    $_SESSION["admin_messgae"]="Malumotlar yangilandi";
    header("Location:settings.php");
}





?>