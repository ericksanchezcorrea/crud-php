<?php include './layout/cabecera.php' ?>

<?php
    // ob_start();
    // ob_end_flush();
    session_start();

    // Verifica si el usuario ya ha iniciado sesión
    if(isset($_SESSION['usuario'])) {
        header('Location: main.php');
        exit;
    }
?>

<?php
    $nombre = "";
    $password = "";
    $password_confirm = "";
    $password_err = "";

    if ($_POST) {

        $password = $_POST["password"];
        $password_confirm = $_POST["password_confirm"];
        $nombre = $_POST["nombre"];

        if (empty($password)) {
            $password_err = "Por favor ingrese una contraseña.";
        }

        if (empty($nombre)) {
            $password_err = "Por favor ingrese un nombre de usuario.";
        }

        if ($password !== $password_confirm) {
            $password_err = "Las contraseñas no coinciden.";
        }
        
        if (empty($password_err)) {
            // Si las contraseñas son válidas, enviar los datos por POST a signUp.php
            $_SESSION['nombre'] = $nombre;
            $_SESSION['password'] = $password;
            header('Location: ../db/signUp.php');
        }
        
    }
?>

    <h1>Registro de usuario</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class='input_container'>
            <label>Usuario</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        </div>

        <div class='input_container'>
            <label>Contraseña:</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>
        <div class='input_container'>
            <label>Confirmar contraseña:</label>
            <input type="password" name="password_confirm" value="<?php echo $password_confirm; ?>">
        </div>
        <div class='input_container'>
            <input type="submit" value="Registrarse">
        </div>
    </form>

    <a class="enlace" href="./index.php">Iniciar sesión</a>

    <?php if (!empty($password_err)): ?>
        <p class='error'><?php echo $password_err; ?></p>
    <?php endif; ?>

<?php  include'./layout/pie.php' ?>
