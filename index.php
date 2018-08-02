<?php 

/* 
x Create a form for sending mails.
x Needs to have: Name, Email, message text, sbmit button
x All fields need to be filled out (check and alert if are not)
email must be a valid email, alert if not
 filled out fields need to remain in the form
email must be sent with all of the form contents in it.
*/
$msg = "";
$msgClass = "";

 if(filter_has_var(INPUT_POST, "submit")){
    $name = htmlentities($_POST["name"]);
    $email = htmlentities($_POST["email"]);
    $message = htmlentities($_POST["message"]);
    
    if(!empty($name) && !empty($email) && !empty($message)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo "email looks great!";
        } else {
            $msg="Please fill in a valid email";
            $msgClass = "alert alert-danger";
        }
    } else {
        $msg="Please fill all the fields";
        $msgClass = "alert alert-danger";
    };
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
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <div class="bs-component">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-lg-12"><h1 id="buttons"></h1></div>
    <div class="container">
            <?php if($msg!=""): ?>
                <div class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label>Name</label> 
                <input class="form-control" type="text" name="name" value="<?php echo isset($_POST["name"]) ? $name : ""; ?>">
            </div>
            <div class="form-group">
                <label>E-mail</label> 
                <input class="form-control" type="text" name="email" value="<?php echo isset($_POST["email"]) ? $email : "" ;?>">
            </div>
            <div class="form-group">
                <label>Message</label> 
                <textarea class="form-control" type="text" name="message" value=""><?php echo isset($_POST["message"]) ? $message : "" ;?></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Send Mail</button>
        </form>
    </div>

    <script src="js/vendor/jquery.js"></script>
    </body>
</html>