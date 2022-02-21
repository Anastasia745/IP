<?php

//var_dump($_POST);
/*$data = [
    "country" => $_POST['country'],
    "city" => $_POST['city']
];*/
/*$connection = new PDO('mysql:host=localhost;dbname=Lab3', 'root', '');
$sql = 'INSERT INTO cities (country, city) VALUES (:country, :city)';
$statement = $connection->prepare($sql);
$result = $statement->execute($);*/
//var_dump($result);

$country = $_POST['country'];

$connect = mysqli_connect("localhost", "root", "", "Lab3");
$cities = mysqli_query($connect, "SELECT city FROM `cities` WHERE `country`='$country'");   //WHERE `country` LIKE '%$country%'
echo "\n";
while($result = mysqli_fetch_assoc($cities))
{
    echo "\t";
    echo $result['city'];
    echo "\n\n";
}