<?php

// Check if the breed parameter is provided

if (isset($_GET['breed'])) {
    $breed = $_GET['breed'];


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

// Fetch the breed information from the database

$query = "SELECT * FROM breeds WHERE breed = :breed";
$statement = $db->prepare($query);
$statement->bindValue(':breed', $breed);
$statement->execute();
$breedInfo = $statement->fetch(PDO::FETCH_ASSOC);


// Return the breed information as JSON

header('Content-Type: application/json');
echo json_encode($breedInfo);
} else {
    echo "No breed parameter provided";
}
?>
```

