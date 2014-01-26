<?php
    $name = $_POST['name'];
    $score = $_SESSION['game']['result'];
    $send = false;

    if (isset($_POST['highscore'])) {
        if (empty($name)) {

            echo '<div class="text-center alert alert-danger">Gib bitte deinen Namen f&uuml;r die Highscoreliste ein.</div>';
            $send = true;
        }
        if (!empty($name)) {
            $dbH->makeEntry('highscore' . ' (user, score)', "('$name', '$score')");
            session_unset(); ?>
            <a href="http://www.country-quiz.wizmo.de/" class="gameEnd btn btn-primary">Noch eine Runde?</a>
            <?php
        }
    } else {
        $send = true;
    }
?>
<?php if($send):?>
    <div class="gameEnd">
        <form method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <input type="submit" class="btn btn-primary" name="highscore" value="Highscore speichern"/>
        </form>
    </div>
<?php endif; ?>