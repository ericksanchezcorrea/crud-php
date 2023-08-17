<?php

    include ('db.php');
    
    $nombre = $_SESSION['nombre'];
    $password = $_SESSION['password'];

    // verificar si el usuario existe

    $sql1 = "select * from usuarios where nombre= '$nombre';";
    $query1 = mysqli_query($conn, $sql1);

    $usuarioDB = $query1->fetch_assoc();

    if($usuarioDB){
        echo $usuarioDB['nombre']."<br>";
        echo $usuarioDB['id']."<br>";
        die("usuario registrado");
    }


    // crear el usuario
    $sql2 = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$password');";
    $query2 = mysqli_query($conn, $sql2);


    $sql3 = "select * from usuarios where nombre= '$nombre';";
    $query3 = mysqli_query($conn, $sql1);

    $usuarioNuevo = $query3->fetch_assoc();

    // credenciales de inicio de sesión
    $_SESSION['usuario'] = 'Usuario conectado recien registrado';
    $_SESSION['id'] = $usuarioNuevo['id'];

    header('Location: ../vistas/main.php');

?>