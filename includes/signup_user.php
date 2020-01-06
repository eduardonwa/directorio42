<?php 

    if(isset($_POST['signup-submit'])) {
        require 'dbh.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password-repeat'];

        if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
            header("Location: ../registrar.php?error=campovacio&uid=".$username."&mail=".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../registrar.php?error=correousuarioinvalido");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../registrar.php?error=correoinvalido&uid=".$username);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            header("Location: ../registrar.php?error=usuarioinvalido&mail=".$email);
            exit();
        }
        else if ($password !== $password_repeat) {
            header("Location: ../registrar.php?error=palabraclave&uid=".$username."&mail=".$email);
            exit();
        }
        else {
            $sql = "SELECT uid_users FROM users WHERE uid_users=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../registrar.php?error=sqlerror");
                exit();
            }
            else { 
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result_check = mysqli_stmt_num_rows($stmt);
                if ($result_check > 0) {
                    header("Location: ../registrar.php?error=usuarioexiste&mail=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (uid_users, user_email, user_password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../registrar.php?error=inserterror");
                        exit();
                    }
                    else {
                        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_pwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../registrar.php?registro=exito");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }

    else {
        header("Location: ../registrar.php");
        exit();
    }
?>