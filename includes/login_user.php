<?php

    if(isset($_POST['login-submit'])) {
        
        require 'dbh.php';

        $mailuid = $_POST['mailuid'];

        $password = $_POST['password'];

        if (empty($mailuid) || empty($password)) {
            header("Location: ../index.php?error=campovacio");
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE uid_users=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit(); 
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $mailuid);
                mysqli_stmt_execute($stmt);
                $results = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($results)) {
                    $password_check = password_verify($password, $row['user_password']);
                    if ($password_check == false) {
                        header("Location: ../index.php?error=claveinvalida");
                        exit();
                    }
                    else if ($password_check == true) {
                        session_start();
                        $_SESSION['user_id'] = $row['id_user'];
                        $_SESSION['userUid'] = $row['uid_users'];

                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else {
                        header("Location: ../index.php?error=claveinvalida");
                        exit();
                    }
                }
                else {
                    header("Location: ../index.php?error=nohayusuario");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }
?>