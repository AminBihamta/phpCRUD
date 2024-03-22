<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];

    try {
        require_once "dbh.inc.php";
    
        $query = "SELECT * FROM users WHERE FirstName = :firstName";


        $statement = $pdo->prepare($query);
        $statement->bindParam(":firstName", $firstName);

        $statement->execute();

        $person = $statement->fetchAll(PDO::FETCH_ASSOC);


        $pdo = null;
        $statement = null;
    } catch (PDOException $e) {
        die("Insertion failed: ". $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Search Results</h3>
    <?php
    if (empty ($person))
        echo "No person";
    foreach ($person as $row) {
        echo htmlspecialchars($row["FirstName"]). " " . htmlspecialchars($row["LastName"]) . "</br>";
    }
    ?>
</body>
</html>