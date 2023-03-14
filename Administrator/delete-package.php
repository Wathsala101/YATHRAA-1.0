<?php

include('includes/config.php'); // Using database connection file here
$id=$_POST['delete'];

// construct the delete statement
$sql = 'DELETE FROM tbltourpackages
        WHERE PackageId = :id';

// prepare the statement for execution
$query = $dbh->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query-> execute();

header('Location: '."manage-packages.php");

// execute the statement
//if ($statement->execute()) {
//echo 'publisher id ' . $publisher_id . ' was deleted successfully.';
//}

?>
