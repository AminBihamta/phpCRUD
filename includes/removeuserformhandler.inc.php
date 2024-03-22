<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];

    try {
        require_once "dbh.inc.php";
    
        $query = "DELETE FROM users WHERE FirstName = :firstName";


        $statement = $pdo->prepare($query);
        $statement->bindParam(":firstName", $firstName);

        $statement->execute();

        $pdo = null;
        $statement = null;

        header("Location: ../index.php");

    } catch (PDOException $e) {
        die("Insertion failed: ". $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}