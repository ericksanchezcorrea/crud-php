<?php

    include ('db.php');

    
    if(isset($_POST)){
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        
        $sql = "select * from usuarios where nombre = '$nombre'";
        $query = mysqli_query($conn, $sql); 
        
        $obj = mysqli_fetch_object($query);
        
        if(!$obj){
            $_SESSION['message_user'] = 'Usuario no encontrado';
            header('Location: ../vistas/index.php');
            return;
        }
        
        if(!$password){
            $_SESSION['message_user'] = 'Inserte una contraseña ';
            header('Location: ../vistas/index.php');
            return;
        }
        
        if(!($obj->password == $password)){
            $_SESSION['nombre'] = $nombre;
            $_SESSION['message_user'] = 'Contraseña incorrecta';
            header('Location: ../vistas/index.php');
            return;
        }
        
        
        $_SESSION['usuario'] = 'Usuario conectado';
        $_SESSION['id'] = $obj->id;
        header('Location: ../vistas/main.php');
        
    }

?>