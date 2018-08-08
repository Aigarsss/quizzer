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
                <div class="current">Question 1 of 5</div>
                <p class="question">This is the first question</p>
                <form action="process.php" methiod="POST">
                    <ul class="choices">
                        <li><input type="radio" name="choice" value="1">This is the 1 answer</li>
                        <li><input type="radio" name="choice" value="1">This is the 2 answer</li>
                        <li><input type="radio" name="choice" value="1">This is the 3 answer</li>
                        <li><input type="radio" name="choice" value="1">This is the 4 answer</li>
                    </ul>
                    <input type="submit" value="submit">
                </form>

            </div>
        </main>
        <footer>
            Copyright &copy; 2018
        </footer>

    <script src="js/vendor/jquery.js"></script>
    </body>
</html>