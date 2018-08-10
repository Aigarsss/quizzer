<?php include 'database.php' ; ?>
<?php session_start(); ?>
<?php
// check if score is set
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    //get total
    $query = "SELECT * FROM `questions`";
    // get the count
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    // check for correct choice
    $query = "SELECT * FROM `choices` WHERE question_number = $number and is_correct = 1";
    // get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    //get the row
    $row = $result->fetch_assoc();

    //set correct choise
    $correct_choice = $row['id'];

    //compare
    if($correct_choice == $selected_choice){
        //answer correct
        $_SESSION['score']++;
    } 

    //check if we are at the end of the test
    if($number == $total){
        header("Location: final.php");
        exit();
    } else {
        header("Location: questions.php?n=".$next);
    }
}