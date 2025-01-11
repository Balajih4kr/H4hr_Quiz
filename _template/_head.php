<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberQuiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <? if(file_exists(($_SERVER['DOCUMENT_ROOT'].'/quiz/css/'.basename($_SERVER['PHP_SELF'],".php").".css"))){?>
      <link rel="stylesheet" href="/quiz/css/<?=basename($_SERVER['PHP_SELF'],".php") ?>.css">
    <? } ?>

    <link rel="stylesheet" href="/quiz/css/landing.css">
    <link rel="stylesheet" href="/quiz/css/navbar.css">
    <link rel="stylesheet" href="/quiz/css/quiz.css">
