<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare data string
    $data = "Username: $username | Password: $hashedPassword" . PHP_EOL;

    // Save to file
    $filePath = "data.txt";
    if (file_put_contents($filePath, $data, FILE_APPEND | LOCK_EX) === false) {
        die("Error saving data.");
    }

    echo "<h2>Login details saved successfully!</h2>";
}
?>
