<?php
include 'database.php'; 
### fetch() ###
$stmtFetch = $pdo->query("select * from questions");
$fetch = $stmtFetch->fetch(); 

### fetchAll() ###
$stmtFetchAll = $pdo->query("select * from questions");
$data = $stmtFetchAll->fetchAll();

### fetchColumn ###
$stmtFetchColumn = $pdo->query("select question_number from questions");
//$data1 = $stmtFetchColumn->fetchColumn();

### table ###
$questionId = 1;
$stmtForTable = $pdo->prepare("select * from choices where question_number =:questionId");
$stmtForTable->execute(['questionId' => $questionId]);

$tData = $stmtForTable->fetchAll();
//var_dump($tData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <h1>Here are some pdo tests</h1> 
        <a href='pdo_tests.php' class="btn btn-primary">reload</a>
        
        <h2>1. Rowcount</h2>
            <p>Rowcount is: <strong><?php echo $stmtFetch->rowcount(); ?></strong></p>

        <h2>2. fetch()</h2>
            <p><strong>Description of fetch():</strong> If a query is supposed to return just a single row, then you can just call fetch() method of the variable:</p>
            <p>Question number is: <?= $fetch['question_number']; ?> and the text is: <?= $fetch['text']; ?></p>
            <p>You can also do it with while (note that the 1st option got snatched by previous fetch():</p>
                <ul>
                    <?php while($row = $stmtFetch->fetch()) :?>
                        <li><?=$row['question_number'] . " " .  $row['text']; ?></li>
                    <?php endwhile ;?>
                </ul>

        <h2>3. fetchAll()</h2>
            <p><strong>Description of fetchAll():</strong> the most preferred way to fetch multiple rows that needs to be shown on a web-page is calling the great helper method called fetchAll(). It will get all the rows returned by by a query into a PHP array that later can be used to output the data using a template (which is considered much better than echoing the data right during the fetch process):</p>
            <p>Looping using foreach:</p>
            <ul>
                <?php foreach($data as $value) : ?>
                <li><?=$value['text'] . " " . $value['question_number'] ; ?></li>
                <?php endforeach; ?>
            </ul>

        <h2>4. fetchColumn()</h2>
            <p>Just outputing one column</p>
            <?php while($data1 = $stmtFetchColumn->fetchColumn()) : ?>
                <?= $data1 . "<br>"; ?>
            <?php endwhile; ?>

        <h2>5. draw table</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Is_correct</td>
                    <th>Text</td>
                </tr>
                <?php foreach($tData as $data) :?>
                <tr>
                    <td><?=$data['is_correct'] ;?></td>
                    <td><?=$data['text'] ;?></td>
                </tr>
                <?php endforeach; ?>
            </table>
    </div>
</body>
</html>




