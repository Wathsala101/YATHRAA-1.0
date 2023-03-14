<?php
include('includes/config.php');
echo "aa";
if(isset($_POST['submit1'])) {

    echo "bb";
    $forumId = $_POST['forumId'];
    $comment = $_POST['comment'];
    $email=$_SESSION['login'];

    echo "aa";
    // Validation checks here

    try {
        // Insert comment into the database
        $sql = "INSERT INTO tblenquiry (id, comment,UserEmail) VALUES (:forumId, :comment,:email)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':forumId', $forumId, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        echo "Comment inserted successfully";
        // Redirect to the forum post page or display a success message
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        // Display an error message
    }
}
?>
