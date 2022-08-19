<?php
ob_start();
session_start();
include "init.php";
if(isset($_GET["id"]) && isset($_GET["from"]) && $_GET["from"] == "members" ){
    $member_id = $_GET["id"];
    global $con;
    $stmt = $con->prepare("DELETE From members WHERE id=:member_id");
    $stmt->bindParam(":member_id" , $member_id);
    $stmt->execute();
    header("Location:index.php");
}