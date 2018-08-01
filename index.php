<?php 

if(isset($_POST['name'])) {
    $name =  htmlentities($_POST['name']);
    //echo $name;
};

?>

<!DOCTYPE html>	
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!-- Add your site or application content here -->
        <div class="container">
            <div>
                <form method = 'POST' action='index.php'>
                    <label>Name </label>
                    <input type='text' name='name'> </br>
                    <input class="btn-danger" type='submit' value='Hit me'>
                </form>
            <div>
         </div>
        <script src="js/vendor/jquery.js"></script>
    </body>
</html>

