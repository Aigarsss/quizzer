<?php include 'database.php'; ?>

<?php
if(isset($_POST['submit'])){
   $question_number=$_POST['question_number'];
   $question_text=$_POST['question_text'];
   $correct_choice=$_POST['correct_choice'];;
   //choices array
   $choices = array();
   $choices[1] = $_POST['choice1'];
   $choices[2] = $_POST['choice2'];
   $choices[3] = $_POST['choice3'];
   $choices[4] = $_POST['choice4'];
   $choices[5] = $_POST['choice5'];

// question query
$query = "INSERT INTO `questions`(question_number, text) VALUES('$question_number', '$question_text')";
// run it
$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
// validate insert
if($insert_row){
    foreach($choices as $choice => $value) {
        if($value != ''){
            if($correct_choice == $choice){
                $is_correct = 1;
                } else {
                    $is_correct = 0;
                }
                //choice query
                $query = "INSERT INTO `choices`(question_number,is_correct,text) 
                VALUES('$question_number','$is_correct','$value')";
                //run it
                $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                //validate insert
                if($insert_row){
                        continue;
                    } else{
                        die($mysqli->error.__LINE__);
                    }
            }
        }
        $msg = 'Question has been added';
    }

}
//total number of questions
$query = "SELECT * FROM `questions`";
//get results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
//get total
$total = $results->num_rows;
$next = $total+1;


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
                <h2>Add a question</h2>
                <?php if(isset($msg)){
                    echo '<p>'.$msg.'</p>';
                } ;?>
                <form action="add.php" method="POST">
                    <p>
                        <label>Question number</label>
                        <input type="number" name="question_number" value="<?=$next ;?>">
                    </p>
                    <p>
                        <label>Question text</label>
                        <input type="text" name="question_text">
                    </p>
                    <p>
                        <label>Choice #1</label>
                        <input type="text" name="choice1">
                    </p>
                    <p>
                        <label>Choice #2</label>
                        <input type="text" name="choice2">
                    </p>
                    <p>
                        <label>Choice #3</label>
                        <input type="text" name="choice3">
                    </p>
                    <p>
                        <label>Choice #4</label>
                        <input type="text" name="choice4">
                    </p>
                    <p>
                        <label>Choice #5</label>
                        <input type="text" name="choice5">
                    </p>
                    <p>
                        <label>Correct choice number</label>
                        <input type="number" name="correct_choice">
                    </p>
                    <input type="submit" name="submit" value="submit">
                </form>
            </div>
        </main>
        <footer>
            Copyright &copy; 2018
        </footer>

    <script src="js/vendor/jquery.js"></script>
    </body>
</html>