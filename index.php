<?php include('database.php'); ?>
<?php 
/*
//total number of questions
$query = "SELECT * FROM `questions`";
//get results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
//get total
$total = $results->num_rows;
*/
######################### PDO #############################
$total = $pdo->query("SELECT count(*) FROM questions")->fetchColumn();

?>

<!DOCTYPE html>	
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>quizz</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
       //-->
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <header>
            <div class="container">
                <h1>Quizz</h1>
                <a href="add.php" class="start right">Add question</a>
            </div>
        </header>
        <main>
            <div class="container">
            <h2>Test your skills</h2>
            <p>This is a multiple choice quizz</p>
                <ul>
                    <li><strong>Number of questions </strong><?=$total ;?></li>
                    <li><strong>Type </strong>Multiple choice</li>
                    <li><strong>Estimated time </strong><?=$total*0.5 ;?> minutes</li>
                </ul>
                <a href="questions.php?n=1" class="start">Start quizz</a>
            </div>
        </main>
        <footer>
            Copyright &copy; 2018
        </footer>

    <script src="js/vendor/jquery.js"></script>
    </body>
</html>