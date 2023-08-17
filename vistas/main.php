<?php include './layout/cabecera.php'; ?>
<?php include '../db/db.php'; ?>

<?php

    // Verifica si el usuario ya ha iniciado sesión

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
        exit;
    }

?>

<h1>To Do List</h1>

<?php if(isset($_SESSION['message'])){ ?>

    <p class='message <?= $_SESSION['message_type']?>'>
        <?=$_SESSION['message'] ?>
         <button class='button_cerrar' >X</button>
    </p>

<?php   unset($_SESSION['message']);
        unset($_SESSION['message_type']); }  
?>



<form action="../db/saveTask.php" method='post'>
    <div class='input_container'>
        <label for="">Tarea</label>
        <input type="text" name="title" autocomplete='off'>
    </div>
    <div class='input_container'>
        <label for="">Descripción</label>
        <textarea name="description"></textarea>
    </div>
    <div class='input_container'>
        <input type="submit" value="Guardar">
    </div>
</form>


<div>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Crated at</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql= "select * from tasks where user_id='".$_SESSION['id']."'";
            $query = mysqli_query($conn, $sql);
            
            for ($i=0; $i<$query->num_rows ; $i++) { 
                $fila = $query->fetch_assoc();

                echo    "<tr>
                            <td>". $fila['title']."</td>
                            <td>". $fila['description']."</td>
                            <td>". $fila['created_at']."</td>
                            <td>
                                <a class='a_button edit' href='../db/edit.php?id=".$fila['id']."'>
                                    <i class='fa-sharp fa-solid fa-marker'></i>
                                </a> 
                                <a class='a_button delete' href='../db/deleteTask.php?id=".$fila['id']."'>
                                    <i class='fa-solid fa-trash'></i>
                                </a> "
                            ."</td>
                        </tr>";

            }

            ?>
    
        </tbody>
    </table>

    <a class='a_button_salir' href="../db/logout.php"><button>Salir</button></a>
</div>


<?php include './layout/pie.php'; ?>

