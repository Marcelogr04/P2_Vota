<?php 
session_start();
$_SESSION['page'] = 'create_poll';
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    http_response_code(403);
    include('errores/error403.php');
    exit;
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación Encuesta</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="create_poll.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include('header.php');
    ?>
    <h1 id="reg"></h1>
    <?php
    $userId= $_SESSION['user_id'];
    $username= $_SESSION['usuario'];
    if(isset($_POST['question'])){
    $creator = $_SESSION['user'];
    $question = $_POST["question"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    
    $options = isset($_POST["option"]) ? $_POST["option"] : [];

    echo "Pregunta: $question<br>";
    echo "Fecha de inicio: $start<br>";
    echo "Fecha de fin: $end<br>";

    if (!empty($options)) {
        echo "Opciones seleccionadas:<br>";
        foreach ($options as $option) {
            echo "$option<br>";
        }
    } else {
        echo "No se seleccionaron opciones.";
    }

    }
    ?>
    <?php
    include('footer.php');
}
    ?>
</body>
</html>