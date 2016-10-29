<?php
$id = $_POST['id'];
try {
$bdd = new PDO('mysql:host=sql.itcave.nazwa.pl;dbname=itcave_2', 'itcave_2', 'Perseusz20^!');
} catch(Exception $e) {
exit('Unable to connect to database.');
}
$sql = "DELETE from evenement WHERE id=".$id;
$q = $bdd->prepare($sql);
$q->execute();
?>
