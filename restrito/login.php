<?php
    $user = "admin";
    $psw  = "admin";
    if (isset($_POST['btn-logou'])) {
        session_start();
        if ($_POST['user'] == $user && $_POST['psw'] == $psw) {
            $_SESSION['logado'] = true;
            header("Location: listagem.php");
        } else {
            $_SESSION['logado'] = false;
            echo "<script>alert('Usuário incorreto!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
</head>
<body>
    <form action="" method="POST">
        User:     <input type="text" name="user">
        Password: <input type="password" name="psw">
        <input type="submit" name="btn-logou">
    </form>
    <hr>

</body>
</html>