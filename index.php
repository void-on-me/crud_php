<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 style="text-align: center">Welcome</h1>

    <div class="container my-5">
        <h2>List of people</h2>
        <a class="btn btn-primary" href="/actions/create.php">Create</a> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'database/connection.php';
                $people = getPeople($conn);
                foreach ($people as $pearson) {
                    echo "
                            <tr>
                    <td>{$pearson['name']}</td>
                    <td>{$pearson['surname']}</td>
                    <td>{$pearson['email']}</td>
                    <td>
                        <a class='btn btn-primary' href='/actions/edit.php?id=$pearson[email]'>Edit</a>
                        <a class='btn btn-primary' href='/actions/delete.php?id=$pearson[email]''>Delete</a>
                    </td>
                </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>

<?php

?>