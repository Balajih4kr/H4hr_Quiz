<?php

session_start();

$isLoggedIn = isset($_SESSION['user_id']);
?>










<style>
    @media only screen and (max-width: 450px) {
        button{
            margin-top: 10px;
        }

}
/* @media only screen and (max-width: 800px) {
        button{
            margin-top: 10px;
        }
    } */
</style>

<section class="container quiz-container mt-5">
    <h2 class="text-center mb-4" style="color: #00ff00;">Select Your Quiz</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px;">
                <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREn8cM7CGQiIhe699BOyppY-Y7FDNnfjku3A&s" alt="Quiz 1" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Breakig Illusion</h4>
                
                <p style="font-size: 1rem;">Breaking the illusin of hacking and dive into the hacker Mindeset</p>
                <?php if($isLoggedIn):?>
                <a href="quiz_page.html" style="text-decoration: none;">
                
                <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button></a>

                <?php else: ?>
                    <!-- If the user is NOT logged in, show a Login button that triggers a modal -->
                    <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Start quiz
                    </button>
                <?php endif; ?>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px; ">
                <img class="img-fluid" src="data:image/jpeg;base64,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" alt="Quiz 2" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Linux Commands</h4>
                <p style="font-size: 1rem;">Test your understanding of scientific principles and tech trends.</p>
                <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px;">
                <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRPc5JUk6Q17pF2X59iUQcUBq6KER_4jcGFQ&s" alt="Quiz 3" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Operating System</h4>
                <p style="font-size: 1rem;">Delve into historical events and moments that shaped the world.</p>
                <button  class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px;">
                <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRPc5JUk6Q17pF2X59iUQcUBq6KER_4jcGFQ&s" alt="Quiz 3" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Operating System</h4>
                <p style="font-size: 1rem;">Delve into historical events and moments that shaped the world.</p>
                <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px;">
                <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRPc5JUk6Q17pF2X59iUQcUBq6KER_4jcGFQ&s" alt="Quiz 3" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Operating System</h4>
                <p style="font-size: 1rem;">Delve into historical events and moments that shaped the world.</p>
                <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="quiz-card" style="background: #1a1a1a; border: 1px solid #00ff00; border-radius: 8px; padding: 15px; text-align: center; color: #00ff00; margin-top: 30px;">
                <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRPc5JUk6Q17pF2X59iUQcUBq6KER_4jcGFQ&s" alt="Quiz 3" style="width: 300px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 10px;">Operating System</h4>
                <p style="font-size: 1rem;">Delve into historical events and moments that shaped the world.</p>
                <button class="start-quiz" style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s; margin-right: 10px;">Start Quiz</button>
                <button style="padding: 10px 20px; background: black; color: #00ff00; border: 2px solid #00ff00; border-radius: 5px; cursor: pointer; transition: transform 0.3s;"><i class="fas fa-trophy"></i> Leaderboard</button>
            </div>
        </div>

    </div>
</section>


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #1a1a1a; color: #00ff00;">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You must be logged in to start the quiz. Please <a href="login.php" style="color: #00ff00;">log in</a> to proceed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="login.php">
            <button type="button" class="btn btn-primary">Go to Login</button>
        </a>
      </div>
    </div>
  </div>
</div>


<!-- <script>

   


document.querySelectorAll('.start-quiz').forEach(button => {
    button.addEventListener('click', function () {
        if (!isLoggedIn) {
  
            document.getElementById('loginPopup').style.display = 'flex';
        } else {

            window.location.href = 'quiz.php';
        }
    });
});

function closePopup() {
    document.getElementById('loginPopup').style.display = 'none';
}


</script> -->

<script>document.getElementById('loginButton').addEventListener('click', function() {
    var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
    myModal.show();
});</script>
