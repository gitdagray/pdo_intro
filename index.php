<?php 
    $city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);

    include_once "config/Database.php"; 

    if ($city) {
        $query = 'SELECT * FROM city WHERE Name LIKE :city ORDER BY Population DESC';

        $statement = $db->prepare($query);
        $statement->bindValue(':city', "%" . $city . "%");
        $statement->execute();
        //$statement->debugDumpParams();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Tutorial</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Search Cities</h1>
    </header>
    <section>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
            <h2 id="enter-a-city">Enter a City:</h2>
            <input type="text" id="city" name="city" aria-labelledby="enter-a-city" required>
            <button>Submit</button>
        </form>
    </section>
    <section>
    <?php if (!empty($results)) { ?>
        <h2><?php echo count($results) ?> Results</h2>
        <?php foreach ($results as $result) {
            echo "<p>{$result['Name']} - Pop: {$result['Population']}</p>";
        } ?>
    <?php } else {
        echo "<p>No Results.</p>";
    } ?>
    </section>
</body>
</html>