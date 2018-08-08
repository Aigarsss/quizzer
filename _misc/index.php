<?php include 'includes\header.php'; ?>
<?php include 'config.php'; ?>

<div class="container">
    <form class="" action="question.php" method="POST">
        <h2>Test questions</h2>
        <div>
            <input type="text" name="name" placeholder="Enter your name">
        </div>
        <div>
            <select name="tests" id="">
                <option selected disabled>Choose a test</option>
                
                <?php foreach($result as $val) : //PHP to get the test names?>
                <option><?=$val->test_name; ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <input type="submit" name="submit">
    </form>
</div>

<?php include 'includes/footer.php'; ?>