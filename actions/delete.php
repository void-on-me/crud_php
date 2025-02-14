<?php
require_once '../database/connection.php';

$id = $_GET['id'];

if (deleteRow($conn, $id)) {
    header("Location: ../index.php?success=Record deleted");
} else {
    header("Location: ../index.php?error=Error record not deleted");
}
