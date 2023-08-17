
<?php
    include './layout/cabecera.php';
    include '../db/db.php' 
?>

<?php

    $nombre = "";

    // Verifica si el usuario ya ha iniciado sesión
    if(isset($_SESSION['usuario'])) {
        header('Location: main.php');
        exit;
    }

    if(isset($_SESSION['nombre'])) {
        $nombre = $_SESSION['nombre'];
    }
?>

    <h1>App ToDo List</h1>
    <h2>Iniciar sesion</h2>

    <form action="../db/login.php" method="POST"  >

        <div class='input_container'>
            <label for="">Usuario</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" >
        </div>

        <div class='input_container'>
            <label for="">Contraseña</label>
            <input type="password" name="password" id="password">
        </div>

        <div class='input_container'>
            <input type="submit" value="Ingresar">
        </div>

    </form>

    <a class="enlace" href="./registrarse.php">Registrarse</a>

<?php

    if(isset($_SESSION['message_user'])){
        echo "<p class='error'>".$_SESSION['message_user']."</p>";
        unset($_SESSION['message_user']);
    }

?>


<?php include './layout/pie.php' ?>



