<?php 
session_start();
$style="style.css";
include "init.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $pass = filter_var($_POST["pass"],FILTER_SANITIZE_STRING);
    $hashed_pass = sha1($pass);
    check_member($email,$hashed_pass);
}
?>

<div class="form_data">
    <form method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="pass" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php 

include $temp_path . "footer.php";