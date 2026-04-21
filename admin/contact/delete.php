<?php

require("../../db/connect.php");

$m_id=$_POST["m_id"];

$sql="DELETE FROM contact WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([
  ':id'=>$m_id
]);
header("Location:index.php");

?>