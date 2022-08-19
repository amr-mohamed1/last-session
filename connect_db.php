<?php 

$dsn = "mysql:host=localhost;dbname=sessions";
$user = "root";
$pass="";

try{
    $con = new PDO($dsn , $user , $pass);
   
}catch(PDOException $e){
    echo "error" . $e->getMessage();
}
?>

