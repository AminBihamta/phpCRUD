<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>All Users</h2>
    <?php
        require_once "includes/dbh.inc.php";
        $query = "SELECT * FROM users";
        $statement = $pdo->prepare($query);
        $statement->execute();

        $person = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $statement = null;        
            if (empty ($person))
        echo "No person";
    foreach ($person as $row) {
        echo htmlspecialchars($row["FirstName"]). " " . htmlspecialchars($row["LastName"]) . "</br>";
    }

    ?>

    <h2>Add users</h2>
    <form action="includes/formhandler.inc.php" method="post">
        <input placeholder="First Name" type="text" name="firstName">
        <input placeholder="Last Name" type="text" name="lastName">
        <button>Add User</button>
    </form>
    <h2>Remove User</h2>
    <form action="includes/removeuserformhandler.inc.php" method="post">
        <input placeholder="First Name" type="text" name="firstName">
        <button>Delete User</button>
    </form>
    <h2>Search Form</h2>
    <form action="includes/searchformhandler.inc.php" method="post">
        <input placeholder="First Name" type="text" name="firstName">
        <button>Search</button>
    </form>
</body>
</html>