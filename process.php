<?php
$host = 'localhost'; // Change to Cloud SQL instance connection name during deployment
$dbname = 'registration_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password) VALUES (:name, :email, :phone, :password)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $password,
        ]);

        echo "Data stored successfully.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
