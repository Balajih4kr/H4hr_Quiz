<?php
require_once 'libs/include/db.php';

session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$connection = Database::get_connection();

// Fetch user details
$stmt = $connection->prepare("SELECT username, profile_image_url FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $profile_image_url);
$stmt->fetch();
$stmt->close();

// Check if the user already has a profile image
if (empty($profile_image_url)) {
    // List of hacker images
    $hacker_images = [
        'https://img.freepik.com/free-photo/china-secret-police-agent-using-mass-propaganda-tools-influence-population_482257-90044.jpg?ga=GA1.1.1247732376.1722577871&semt=ais_hybrid',
        'https://img.freepik.com/free-photo/hooded-computer-hacker-stealing-information-with-laptop_155003-1919.jpg?ga=GA1.1.1247732376.1722577871&semt=ais_hybrid',
        'https://img.freepik.com/free-photo/matrix-hacker-background_23-2150082005.jpg?ga=GA1.1.1247732376.1722577871&semt=ais_hybrid',
        'https://img.freepik.com/free-vector/anonymous-hacker-with-flat-design_23-2147880075.jpg?ga=GA1.1.1247732376.1722577871&semt=ais_hybrid'
    ];

    // Select a random hacker image
    $profile_image_url = $hacker_images[array_rand($hacker_images)];

    // Save the image URL in the database
    $stmt = $connection->prepare("UPDATE users SET profile_image_url = ? WHERE id = ?");
    $stmt->bind_param("si", $profile_image_url, $user_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch user progress
$stmt = $connection->prepare("SELECT progress, completed_quizzes, badges FROM user_profile WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($progress, $completed_quizzes, $badges);
$stmt->fetch();
$stmt->close();

// Set default progress if not set
if (empty($progress)) {
    $progress = 0;
}

// Parse completed quizzes and badges (assuming JSON format)
$completed_quizzes = !empty($completed_quizzes) ? json_decode($completed_quizzes, true) : [];
$badges = !empty($badges) ? json_decode($badges, true) : [];

?>
<section class="container user-dashboard mt-5">
    <h2 class="text-center mb-4" style="color: #00ff00;">User Dashboard</h2>

    <!-- User Profile Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 text-center">
            <div class="profile-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 12px; padding: 20px;">
                <!-- Fixed hacker image for each user -->
                <img src="<?= htmlspecialchars($profile_image_url) ?>" alt="User Profile" class="rounded-circle mb-3" style="border: 3px solid #00ff00; width: 150px; height: 150px; object-fit: cover;">
                <h3 style="color: #00ff00;"><?= htmlspecialchars($username) ?></h3>
                <p style="color: #cccccc;">CyberQuiz Enthusiast</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row g-4">
        <!-- Progress Section -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="dashboard-card w-100" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 12px; padding: 20px; text-align: center; color: #00ff00;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Progress</h4>
                <p style="font-size: 1rem;">Track your quiz progress and performance.</p>
                <div class="progress" style="height: 20px; border-radius: 10px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= htmlspecialchars($progress) ?>%;" aria-valuenow="<?= htmlspecialchars($progress) ?>" aria-valuemin="0" aria-valuemax="100"><?= htmlspecialchars($progress) ?>%</div>
                </div>
            </div>
        </div>

        <!-- Completed Quizzes Section -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="dashboard-card w-100" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 12px; padding: 20px; text-align: center; color: #00ff00;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Completed Quizzes</h4>
                <p style="font-size: 1rem;">View the number of quizzes you have completed.</p>
                <p style="font-size: 1.25rem; color: #cccccc;"><?= count($completed_quizzes) ?> Quizzes Completed</p>
            </div>
        </div>

        <!-- Earned Badges Section -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="dashboard-card w-100" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 12px; padding: 20px; text-align: center; color: #00ff00;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Earned Badges</h4>
                <p style="font-size: 1rem;">Show off your achievements.</p>
                <div class="d-flex justify-content-center flex-wrap">
                    <?php foreach ($badges as $badge): ?>
                        <img src="<?= htmlspecialchars($badge['url']) ?>" alt="<?= htmlspecialchars($badge['name']) ?>" style="margin: 5px; border-radius: 50%; border: 2px solid #00ff00;">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
