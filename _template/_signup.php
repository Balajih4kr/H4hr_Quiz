<?php
require_once 'libs/include/db.php';

ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Strict');

session_start();

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $csrf_token = $_POST['csrf_token'] ?? '';

    // Initialize errors array
    $errors = [];

    // Validate CSRF token
    if ($csrf_token !== $_SESSION['csrf_token']) {
        $errors[] = "Invalid CSRF token. Please refresh the page and try again.";
    }

    // Validate input fields
    if (empty($username) || !preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) {
        $errors[] = "Username must be 3-20 characters and contain only letters, numbers, and underscores.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $errors[] = "Password must be at least 8 characters, include a number, and an uppercase letter.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Proceed only if no errors
    if (empty($errors)) {
        try {
            $connection = Database::get_connection();
            
            // Check if email already exists
            $stmt = $connection->prepare("SELECT `id` FROM `users` WHERE `email` = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errors[] = "An account with this email already exists.";
            } else {
                // Insert new user
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $connection->prepare("INSERT INTO `users` (`username`, `email`, `password_hash`) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    $user_id = $stmt->insert_id;

                    // Create an empty profile for the new user
                    $stmt_profile = $connection->prepare("INSERT INTO `user_profile` (`user_id`) VALUES (?)");
                    $stmt_profile->bind_param("i", $user_id);

                    if ($stmt_profile->execute()) {
                        header("Location: login.php?success=1");
                        exit;
                    } else {
                        $errors[] = "Failed to create user profile. Please try again.";
                    }
                    $stmt_profile->close();
                } else {
                    $errors[] = "Something went wrong while creating your account. Please try again.";
                }
                $stmt->close();
            }
        } catch (Exception $e) {
            $errors[] = "An error occurred: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Sign Up</title>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .signup-container {
            margin-top: 5%;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 12px;
            background-color: #1a1a1a;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
        }

        .form-control {
            background-color: #1a1a1a;
            border: 1px solid #00ff00;
            color: #fff;
            width: 100%;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #00ff00;
        }

        .btn-primary {
            background-color: #00ff00;
            border: none;
            color: #121212;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #00cc00;
        }

        .icon {
            font-size: 2rem;
            color: #00ff00;
        }

        .text-muted {
            color: #888 !important;
        }

        div label {
            text-align: left !important;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="signup-container text-center">
        <i class="fas fa-user-plus icon mb-3"></i>
        <h2 class="mb-4">Sign Up</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3 text-start">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="mb-3 text-start">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your password" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <div class="mt-3 text-center">
                <p class="text-muted">Already have an account? <a href="login.php" class="text-success">Login</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
