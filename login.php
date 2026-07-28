<?php

session_start();

include "db.php";

$error="";

if(isset($_POST['login']))
{

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE username=?";

    $stmt=mysqli_prepare($conn,$sql);

    mysqli_stmt_bind_param($stmt,"s",$username);

    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0)
    {
        $user=mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password']))
        {
            $_SESSION['user_id']=$user['id'];
            $_SESSION['username']=$user['username'];

            header("Location:index.php");

            exit;
        } else {
            $error="Incorrect password.";
        }
    } else {
        $error="User not found.";
    }
}

include "includes/header.php";

?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h3>Login</h3>          
            </div>
            <div class="card-body">

                <?php
                if($error!="") {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>

                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button name="login" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>