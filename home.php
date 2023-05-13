<!-- home.php -->
<?php
session_start();

// Memeriksa login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Mendapatkan data user
$email = $_SESSION['email'];

// Mendapatkan nama user
$users = [
    'panji@example.com' => 'Panji',
];
$name = $users[$email];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .home-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 150px;
            padding: 30px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .home-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .home-name {
            font-size: 18px;
            text-align: center;
            margin-bottom: 30px;
        }

        .logout-button {
            display: block;
            margin: 0 auto;
            width: 100px;
            font-size: 16px;
            border-radius: 5px;
            padding: 8px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            text-align: center;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 home-container">
                <h2 class="home-title">Welcome, <?= $name ?>!</h2>
                <p class="home-name">You are logged in as <?= $email ?></p>
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>