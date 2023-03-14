<?php
include('includes/config.php');

if (isset($_POST["id"])) {
    // Get the post ID
    $id = $_POST['id'];
    if ($_POST['dislikes'] == NULL) {
        $dislikes=0;
    }
    else{
        $likes = $_POST['dislikes'];
    }

}

$dislikes2=$dislikes+1;
$stmt = $dbh->prepare("UPDATE tblenquiry SET dislikes = :dislikes2 WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':dislikes2', $dislikes2);
$stmt->execute();

header("Location: forum.php");

?>
