<?php
session_start();
require("connect.php");

$name=!empty($_POST["name"]) ? trim($_POST["name"]) : '';
$email=!empty($_POST["email"]) ? trim($_POST["email"]): '';
$subject=!empty($_POST["subject"]) ? trim($_POST["subject"]) : '';
$message=!empty($_POST["message"]) ? trim($_POST["message"]) : '';
$errors=[];
if($name==''){
    $errors["name"]="Ism maydoni toldirilmagan";
}
if($email==''){
    $errors["email"]="Email maydoni toldirilmagan";
}
if($subject==''){
    $errors["subject"]="Mavzu maydoni toldirilmagan";
}
if($message==''){
    $errors["message"]="Matin maydoni toldirilmagan";
}


if(count($errors)>0){
    $_SESSION["errors"]=$errors;
    header("Location:../index.php");
}
else{

try{
    $sql="INSERT INTO contact(name,email,subject,message) 
    VALUES(:name, :email, :subject, :message)";
    $m=$conn->prepare($sql);
    $m->execute([
        ':name'=>$name,
        ':email'=>$email,
        ':subject'=>$subject,
        ':message'=>$message
    ]);
    $_SESSION["success"]="Malumotlar yozildi";
    header("Location:../index.php");
}catch(PDOException $e){
    echo $e->getMessage();

}

}

?>