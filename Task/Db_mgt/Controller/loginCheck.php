<?php
    session_start();
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $sql = "select password from users where username = '{$username}'";
        $result = mysqli_query($con, $sql);
        $r_pass =  mysqli_fetch_assoc($result);

        if($username == "" || $password == ""){
            echo "null username/password!";
        }
        else if(!mysqli_query($con, $sql))
        {
            echo"User not Found!";
        }
        else if($r_pass['password'] == $password){

            setcookie('status', 'true', time()+3000, '/');
            header('location: ../view/home.php');
        }else{
            echo "invalid user!";
        }
    }else{
        echo "Invalid request! Please submit form!";
    }
?>