<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php
    try {
        // Attempt to get the PDO connection
        if (DB::connection()->getPdo()) {
            // Connection successful
            echo "Successfully connected to DB: " . DB::connection()->getDatabaseName();
        }
    } catch (Exception $e) {
        // Handle connection error
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    </div>
</body>
</html>
