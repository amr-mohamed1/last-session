<?php 

function add_member($name,$email,$pass,$city){
    global $con;
    $stmt = $con->prepare("INSERT INTO members(user_name,email,password,city)value(:u_name,:email,:pass,:city)");
    $stmt->execute(array(
        ":u_name" => $name,
        ":email" => $email,
        ":pass" => $pass,
        ":city" => $city,
    ));
    echo "<script>
toastr.success('Success, Your Data saved.')
</script>";
header("Refresh:3;url=index.php");
}

function check_member($email,$pass){
    global $con;
    $stmt = $con->prepare("SELECT * FROM members WHERE email=?");
    $stmt->execute(array($email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($count){
        if($pass == $row["password"]){
            $_SESSION['id']=$row['id'];
            $_SESSION['username']=$row['user_name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['city']=$row['city'];
            echo "
            <script>
                toastr.success('Welcome back " . $row['user_name'] . " ')
            </script>";
            header("Refresh:3;url=home.php");
        }
    }else{
        echo "
            <script>
                toastr.error('Sorry Email or Password not excit.')
            </script>";
    }
}