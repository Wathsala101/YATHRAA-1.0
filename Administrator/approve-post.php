<?php

include('includes/config.php'); // Using database connection file here
$id=$_POST['approve'];

// construct the delete statement
$sql = 'UPDATE tblenquiry
SET Status = 1
WHERE id=:id';

// prepare the statement for execution
$query = $dbh->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query-> execute();

header('Location: '."manage-forum.php");

// execute the statement
//if ($statement->execute()) {
//echo 'publisher id ' . $publisher_id . ' was deleted successfully.';
//}

?>