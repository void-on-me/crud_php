<?php
require_once '../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);

    $id = htmlspecialchars($_POST['id']);


    if (!empty($name) && !empty($surname) && !empty($id)) {
        if (updateRow($conn, $name, $surname, $id)) {
            header("Location: ../index.php?success=Record updated successfully");
        }
    } else {
        // header("Location: ../edit.php?error=Something is empty");
    }
    exit();
} else {
    header("Location: ../edit.php");
    exit();
}
