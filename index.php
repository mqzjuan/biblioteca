
<?php
    include 'conexion.php';
    session_start();
    $error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM login WHERE user='$usuario'";
        $result = $conn -> query($sql);
        if($result -> num_rows > 0){
            $row = $result -> fetch_assoc();
            if($pass == $row['pass']){
                $_SESSION['user'] = $user;
                header("Location: gestor.php");
                exit();
            } else{
                $error = 'Password incorrecto';
            }
        } else {
                $error = 'No existe ese usuario';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <form method="POST">
    <h1>Iniciar Sesion</h1>
            <input type="text" name="user" placeholder="Usuario" required>
            <input type="password" name="pass" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
    </form>
    <?php if ($error): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>