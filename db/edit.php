<?php

include ('db.php');

if(isset($_GET['id'])){
    $id =  $_GET['id'];
    $sql = "SELECT * FROM tasks where id= $id";

    $query = mysqli_query($conn, $sql);

    if(!$query){
        die('query failed');
    }    

}

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id =  $_GET['id'];
    
    $sql2 = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id";
    $query2 = mysqli_query($conn, $sql2);

    $_SESSION['message'] = 'Task updated succesfully';
    $_SESSION['message_type'] = 'update';

    if(!$query2){
        echo $title." ".$description." ".$id;
        echo '<br>no hecho';
    }
    else{
        header('Location: ../vistas/main.php');
    }

}


?>

<?php include '../vistas/layout/cabecera.php'; ?>

<?php

    for ($i=0; $i<$query->num_rows ; $i++) { 
        $fila = $query->fetch_assoc();

    echo    "<form action='edit.php?id=".$id."' method='post'>
                <h3>Editar</h3>
                <div>
                    <label>Title<label>
                    <input type='text' name='title' value='".$fila['title']."'>
                </div>
                <div>
                    <label>Descripcion<label>
                </div>
                <textarea name='description'>".$fila['description']."</textarea>
                <input type='submit' value='Enviar' name='update'>

            </form>";

    }

?>

<?php include '../vistas/layout/pie.php'; ?>
