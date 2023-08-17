<?php

include ('db.php');

if(isset($_GET['id'])){
    
    $id =  $_GET['id'];
    $sql = "DELETE FROM tasks where id= $id";

    $query = mysqli_query($conn, $sql);

    if(!$query){
        die('query failed');
    }

    $_SESSION['message'] = 'Task removed succesfully';
    $_SESSION['message_type'] = 'deleted';

    header('Location: ../vistas/main.php');

}

?>