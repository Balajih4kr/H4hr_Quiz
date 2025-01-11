<?php
require_once 'libs/include/db.php';
ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Strict');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email and Password are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        $conn = Database::get_connection();
        $stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Invalid email or password!";
            }
        } else {
            $error = "Invalid email or password!";
        }
        $stmt->close();
    }
}
?>

<style>
.login-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    border-radius: 12px;
    background-color: #1a1a1a;
    box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
}
.form-control {
    background-color: #1a1a1a;
    border: 1px solid #00ff00;
    color: #fff;
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
    font-size: 3rem;
    color: #00ff00;
}
.text-muted {
    color: #888 !important;
}
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-container text-center">
        <i class="fas fa-user icon mb-3"></i>
        <h2 class="mb-4">Login</h2>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php"> 
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required> <!-- Added name="email" -->
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required> <!-- Added name="password" -->
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>

            <div class="mt-3">
                <p class="text-muted">Don't have an account? <a href="#" class="text-success">Sign Up</a></p>
            </div>
        </form>
    </div>
</div>
