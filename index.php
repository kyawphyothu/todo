<?php

require 'config.php';

$sql = 'SELECT * FROM todo ORDER BY id DESC';
$statement = $db->prepare($sql);
$statement->execute();
$result =  $statement->fetchAll();
$i = 1;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body>
    <div class="card">
        <div class="card-body">
            <?php if (isset($_GET['successDel'])) : ?>
                <div class="alert alert-warning">Deleated Todo</div>
            <?php endif ?>
            <h2>Todo Home Page</h2>
            <div>
                <a class="btn btn-primary" href="add.php">Create New</a>
            </div><br>
            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $values) :  ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $values->title ?></td>
                            <td><?php echo $values->description ?></td>
                            <td><?php echo date("d,M,Y", strtotime($values->created_at)) ?></td>
                            <td>
                                <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $values->id ?>">Edit</a>
                                <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $values->id ?>">Delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>