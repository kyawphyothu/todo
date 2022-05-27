<?php

require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    // print_r($_POST);

    $sql = "UPDATE todo SET title = '$title', description = '$description' WHERE id = '$id'";
    $statement = $db->prepare($sql);
    $statement->execute();

    header("location: index.php");
} else {
    $id = $_GET['id'];

    $sql = 'SELECT * FROM todo WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':id' => $id,
    ]);
    $result = $statement->fetchAll();
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
            <h1>Update Todo</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]->id ?>">
                <div class="form-group mb-2">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $result[0]->title ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $result[0]->description ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="index.php" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>