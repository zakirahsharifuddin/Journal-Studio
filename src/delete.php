 <?php
 
 $connection = require_once './connection.php';
 
 $connection->removeNote($_POST['id']);
 
 header('Location: index1.php');
 
 ?>