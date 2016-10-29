<?php
// Values received via ajax
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$servername = "sql.itcave.nazwa.pl";
$username = "itcave_2";
$password = "Perseusz20^!";

try {
    $conn = new PDO("mysql:host=$servername;dbname=itcave_2", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



// insert the records
$sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, :end )";
$q = $bdd->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start->format('Y-m-d H:i:s'), ':end'=>$end->format('Y-m-d H:i:s')));
?>
