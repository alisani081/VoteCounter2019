<?php 
session_start();
@mysqli_connect("localhost","id8825089_root","37277079");
@mysqli_select_db("id8825089_votecounter");
try
	{
$pass = '37277079';
$user = 'id8825089_root';
$host = 'localhost';
$db = 'id8825089_votecounter';

$pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);

$pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setattribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
catch(PDOException $e)
{
echo $e->getmessage();
}

?>
