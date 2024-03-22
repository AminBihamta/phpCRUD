<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    try {
        require_once "dbh.inc.php";
        
        
        $query = "INSERT INTO users (FirstName, LastName) VALUES (:firstName, :lastName);";


        $statement = $pdo->prepare($query);
        $statement->bindParam(":firstName", $firstName);
        $statement->bindParam(":lastName", $lastName);

        $statement->execute();

        $pdo = null;
        $statement = null;

        header("Location: ../index.php");
        die();

    } catch (PDOException $e) {
        die("Insertion failed: ". $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}