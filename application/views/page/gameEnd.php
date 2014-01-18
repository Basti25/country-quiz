<?php
    $name = $_POST['name'];
    $score = $_SESSION['game']['result'];
    $send = false;

    if (isset($_POST['highscore'])) {
        if (empty($name)) {
            echo 'Gib bitte deinen Namen ein.';
            $send = true;
        }
        if (!empty($name)) {
            $dbH->makeEntry('highscore' . ' (user, score)', "('$name', '$score')");
            session_unset(); ?>
            <a href="http://www.country-quiz.wizmo.de/" class="btn btn-primary">Noch eine Runde?</a>
            <?php
        }
    } else {
        $send = true;
    }
?>
<?php if($send):?>
    <form method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <input type="submit" name="highscore" value="Highscore speichern"/>
    </form>
<?php endif; ?>