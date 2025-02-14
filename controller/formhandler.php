<?php
require_once '../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);

    if (!empty($name) && !empty($surname) && !empty($email)) {

        if (insertPerson($conn, $name, $surname, $email)) {
            header("Location: ../index.php?success=Record added successfully");
        } else {
            header("Location: ../create.php?error=Failed to add record");
        }
    } else {
        header("Location: ../create.php?error=Please fill in all fields");
    }
    exit();
} else {
    header("Location: ../create.php");
    exit();
}
