<?php

require 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM todo WHERE id = $id";
$statement = $db->prepare($sql);
$statement->execute();

header("location: index.php?successDel=1");
