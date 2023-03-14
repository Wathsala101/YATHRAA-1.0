<?php

// Connect to the database
include('includes/config.php');
session_start();
try {
    // Get the data from the form
    $description = $_POST["comment"];
    $email = $_SESSION['login'];

    // Validate the data
    if (empty($description)) {
        echo "Please fill out all fields.";
        exit;
    }

    // Prepare the SQL statement
    $stmt = $dbh->prepare("INSERT INTO tblcomments(UserEmail,Description) VALUES (:email,:description)");

    // Bind the data to the placeholders in the statement
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':email', $email);

    // Execute the statement
    $stmt->execute();

    // Confirm that the review was submitted
    header("Location: forum.php");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

