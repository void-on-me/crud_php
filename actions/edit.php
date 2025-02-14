<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    if (isset($_GET['error'])) {
        echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>
    <!-- Form elements -->
    <div class="container my-5">
        <h1>Edit a person</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            // Fetch the existing data for the person using the id
            require_once '../database/connection.php';
            $person = getRow($conn, $id);
        ?>
            <form action="/controller/edithandler.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="name">Name</label>
                    <div class="col-sm-6">
                        <input required type="text" class="form-control" name="name" value="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="surname">Surname</label>
                    <div class="col-sm-6">
                        <input required type="text" class="form-control" name="surname" value="">
                    </div>
                </div>
                <!-- Buttons -->
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit edit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/index.php" role="button">Cancel</a>
                    </div>
                </div>
            </form>
        <?php

        } else {
            echo "<p>No ID provided.</p>";
        }
        ?>
    </div>
</body>

</html>