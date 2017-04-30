<?php

require_once 'model/model.php';

// echo "Hello world";

?>

<table border="1">
     <?php
        // $pdo_conn = new PDO("mysql:host=127.0.0.1;dbname=CRUD", 'root', 'phpschool17');
        // $sql = 'SELECT * FROM article';
        // $pdo_statement = $pdo_conn->prepare($sql);
        // $pdo_statement->execute();
        // $result = $pdo_statement->fetchAll();

        // echo "<tr><td>".$result[0][1]."</td> <td>".$result[0][2]."</td> <td>".$result[0][3]."</td></tr>";
        // echo "<tr><td>".$result[1][1]."</td> <td>".$result[1][2]."</td> <td>".$result[1][3]."</td></tr>";
        // echo "<tr><td>".$result[2][1]."</td> <td>".$result[2][2]."</td> <td>".$result[2][3]."</td></tr>";

       // print_r($result);
       // var_dump($result);

       // var_dump($statement->execute());
       // var_dump($statement->errorInfo());
     ?>

 </table>

<?php

if( isset($_POST['name']) &&
    isset($_POST['description']) &&
    isset($_POST['created_at'])) {

    $result = insert(   $_POST['name'],
                        $_POST['description'],
                        $_POST['created_at']);
    var_dump($result);
}

require_once 'view/indexTemplate.php';

