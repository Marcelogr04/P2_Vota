<?php 
session_start();
$_SESSION['page'] = 'list_polls';
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    http_response_code(403);
    include('errores/error403.php');
    exit;
} else {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <title>Listado encuestas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="list_polls.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    include('header.php');
    ?>

    <h1 id="reg">Listado de Encuestas</h1>

    <?php
    $userId = $_SESSION['user_id'];

    try {
        $dsn = "mysql:host=localhost;dbname=p2_votos";
        $pdo = new PDO($dsn, 'martimehdi', 'P@ssw0rd');
        $query = $pdo->prepare("select * from questions where creator_id = $userId;");
        $query->execute();
        $row = $query->fetch();
        $correct = false;
        while ( $row ) {
            $question = $row['question'];
            echo '<div id="box">
                <h4>'.$question.'</h4>
             </div>';
            $row = $query->fetch();
            $correct=true;
        }
        if(!$correct){
            echo "incorrecto";
        }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    include('footer.php');
}
    ?>
</body>
</html>