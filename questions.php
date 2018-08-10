<?php include('database.php'); ?>
<?php session_start(); ?>
<?php 
//all of queries. should actually go into a model?

//getting the question number
$number = (int) $_GET['n'];

// get the question
$query = "SELECT * FROM `questions` WHERE question_number = $number";
//get result
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
$question = $result->fetch_assoc();
//to check if variable returns something: var_dump($question);

// get question choices
$query = "SELECT * FROM `choices` WHERE question_number = $number";
//get result
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

    //get total
    $query = "SELECT * FROM `questions`";
    // get the count
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

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
            </div>
        </header>
        <main>
            <div class="container">
                <div class="current">Question <?= $question['question_number']; ?> of <?= $total; ?></div>
                <p class="question"><?php echo $question['text']; ?></p>
                <form action="process.php" method="POST">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()) : ?>
                        <li><input type="radio" name="choice" value="<?= $row['id']; ?>"><?= $row['text']; ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <input type="submit" value="submit">
                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                </form>
            </div>
        </main>
        <footer>
            Copyright &copy; 2018
        </footer>

    <script src="js/vendor/jquery.js"></script>
    </body>
</html>