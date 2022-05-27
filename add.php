<?php

require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO todo (title, description) VALUES (:title, :description)";
    $statement = $db->prepare($sql);
    $statement->execute([
        ":title" => $title,
        ":description" => $description,
    ]);
    header("location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create New</title>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h1>Add New Todo</h1>
            <form action="add.php" method="post">
                <div class="form-group mb-2">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>