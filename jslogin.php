<?php

session_start();
require_once('config.php');

    // echo "hello world from jslogin.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND passwords = ? LIMIT 1";
    $stmtselect = $db->prepare($sql);
    $result = $stmtselect->execute([$username, $password]);

    if($result){
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0 ){
            $_SESSION['userlogin'] = $user;
            echo "1";
        }else{
            echo 'There not user for that combo';
        }
    }else{
        echo 'There were errors while connecting to database';
    }

?>