<?php
session_start();

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CyberQuiz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #00ff00;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/quiz/"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/quiz/quiz.php"><i class="fas fa-question-circle"></i> Quizzes</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php
                        // Assuming user_id is stored in session when user logs in
                        $user_id = $_SESSION['user_id'];

                        $connection = Database::get_connection();

                        // Query to get the profile image URL and username
                        $stmt = $connection->prepare("SELECT `profile_image_url` FROM `users` WHERE id = ?");
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();
                        $stmt->bind_result($profile_image_url);
                        $stmt->fetch();
                        $stmt->close();
                        
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- User profile image -->
                            <img src="<?= htmlspecialchars($profile_image_url) ?>" alt="User Profile" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                            <?= htmlspecialchars($username) ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- User is not logged in, show login and signup buttons -->
                    <li class="nav-item">
                        <a class="nav-link" href="/quiz/login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/quiz/signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
