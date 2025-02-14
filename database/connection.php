<?php
$host = "localhost";
$dbname = "crud_project";
$user = "root";
$password = "Espresso";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all the record data
function getPeople($conn)
{
    $sqlQuery = "SELECT name, surname, email FROM pearson";
    $result = $conn->query($sqlQuery);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}


// Insert a new "Tupla", aka row
function insertPerson($conn, $name, $surname, $email)
{
    $sqlQuery = $conn->prepare("INSERT INTO pearson (name, surname, email) VALUES (?, ?, ?)");
    $sqlQuery->bind_param("sss", $name, $surname, $email);

    return $sqlQuery->execute();
}

// Delete a row
function deleteRow($conn, $id)
{
    $sqlQuery = $conn->prepare("DELETE FROM pearson WHERE email=?");
    $sqlQuery->bind_param("s", $id);

    return $sqlQuery->execute();
}

// Get a single row
function getRow($conn, $id)
{
    $sqlQuery = $conn->prepare("SELECT name, surname, email FROM pearson where email = ?");
    $sqlQuery->bind_param("s", $id);
    $sqlQuery->execute();
    $result = $sqlQuery->get_result();
    $return = $result->fetch_assoc();
}


// Update record
function updateRow($conn, $name, $surname, $id)
{
    $sqlQuery = $conn->prepare("UPDATE pearson SET name = ?, surname = ? WHERE email = ?");
    $sqlQuery->bind_param("sss", $name, $surname, $id);

    return $sqlQuery->execute();
}
