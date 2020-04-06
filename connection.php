

<?php

$host="";
$pass="";
$user="";
$db="";


try {

	$db= new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
	//echo "bağlantı başarılı....";

} catch (PDOException $e) {
	echo $e->getMessage();
}

?>