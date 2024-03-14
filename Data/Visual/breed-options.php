<?php

// Specify file path to sqlite database 

$databasefile = 'Project_4/dogs.db';

// Connect to the database

try {
    $db = new PDO('sqlite:' . $databasefile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error connecting to the database: ' . $e->getMessage();
    exit();
}

// Fetch all available breeds from the DataBase

$query = "SELECT breed FROM breeds";
$statement = $db->prepare($query);
$statement->execute();
$breeds = $statement->fetchAll(PDO::FETCH_COLUMN);

// Return the breed information as JSON

header('Content-Type: application/json');
echo json_encode($breeds);
?>
```
