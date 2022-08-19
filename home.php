<?php 
ob_start();
session_start();
$style="home.css";
include "init.php";
if(isset($_SESSION["id"])){
?>

<div class="prof_data">
    <h1><?php echo "id = " . $_SESSION["id"]; ?></h1>
    <h2><?php echo "username = " . $_SESSION["username"]; ?></h2>
    <h3><?php echo "email = " . $_SESSION["email"]; ?></h3>
    <h4><?php echo "city = " . $_SESSION["city"]; ?></h4>
    <br>
    <a class="btn btn-success" href="logout.php"> logout </a>
    <a class="btn btn-danger" href="delete.php?id=<?php echo $_SESSION["id"];?>&from=members"> delete </a>
</div>



<?php 
include $temp_path . "footer.php";
}else{
    header("location:index.php");
}
ob_end_flush();