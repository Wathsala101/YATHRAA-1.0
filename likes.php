<?php
include('includes/config.php');
session_start();

if (isset($_POST["id"])) {
    // Get the post ID
    $id = $_POST['id'];
    if ($_POST['likes'] == NULL) {
        $likes=0;
    }
    else{
        $likes = $_POST['likes'];
    }

}

$likes2=$likes+1;
$stmt = $dbh->prepare("UPDATE tblenquiry SET likes = :likes2 WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':likes2', $likes2);
$stmt->execute();
$_SESSION["like"] = $_POST['id'];


header("Location: forum.php");

?>
