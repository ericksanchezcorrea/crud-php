<?php 

include ('db.php');

if(isset($_POST)){
    
    $title = $_POST['title'];
    $description = $_POST['description'];

    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'] ;
        echo $user_id;
    }
    

    $sql = "INSERT INTO tasks (`user_id`, `title`, `description`) VALUES ('$user_id', '$title', '$description');";
    $query = mysqli_query($conn, $sql);

    var_dump($query);

    if(!$query){
        die('query failed');
    }
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';

    header('Location: ../vistas/main.php');

}

?>
