<!-- login.php -->
<?php
session_start();

// Data user
$users = [
    'panji@example.com' => 'password',
];

// Fungsi login
function login($email, $password) {
    global $users;
    if (isset($users[$email]) && $users[$email] == $password) {
        return true;
    }
    return false;
}

// Memeriksa login
if (isset($_SESSION['email'])) {
    header("Location: home.php");
    exit();
}

// Memeriksa form login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (login($email, $password)) {
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit();
    } else {
        $_SESSION['error'] = "Email atau password salah.";
        if (!isset($users[$email])) {
            $_SESSION['error'] = "Email tidak ditemukan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 150px;
            padding: 30px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-form .form-control {
            height: 45px;
            font-size: 16px;
            border-radius: 5px;
        }

        .login-form .btn-primary {
            height: 45px;
            font-size: 16px;
            border-radius: 5px;
            padding: 8px 20px;
            background-color: #007bff;
            border: none;
        }

        .login-form .btn-primary:hover {
            background-color: #0069d9;
        }

        .error-message {
            color: #dc3545;
            margin-bottom: 10px;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="login-title">Login Form</h2>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error-message"><?= $_SESSION['error'] ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form class="login-form" action="login.php" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
</form>
</div>
</div>
</div>

</body>
</html>