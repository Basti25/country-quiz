<?php // Wird am Ende des Spiels eingebunden. Ermöglicht das eingeben eines Namens für die Highscoreliste. ?>
<?php
    $name = $_POST['name'];
    $score = $_SESSION['game']['result'];
    $send = false;

    // Guckt ob das Formular abgeschickt wurde.
    if (isset($_POST['highscore'])) {
        // Validiert ob ein Name gesetzt wurde, wenn nicht wird ein Fehlertext und das Formular ausgegeben.
        if (empty($name)) {

            echo '<div class="text-center alert alert-danger">Gib bitte deinen Namen f&uuml;r die Highscoreliste ein.</div>';
            $send = true;
        }
        // Wenn eine Name da ist wird der Name und der Highscore in die Highscoretabelle der Datenbank geschrieben.
        // Am Ende kann man das Spiel nochmal von vorn starten.
        if (!empty($name)) {
            $dbH->makeEntry('highscore' . ' (user, score)', "('$name', '$score')");
            session_unset(); ?>
            <a href="http://www.country-quiz.wizmo.de/" class="gameEnd btn btn-primary">Noch eine Runde?</a>
            <?php
        }
    } else {
        // Wird die Seite zum ersten Mal aufgerufen wird nur das Formular ausgegeben.
        $send = true;
    }
?>
<?php if($send):?>
    <?php // Formular zum eingeben des Spielernamens. ?>
    <div class="gameEnd">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">

                    <input type="submit" class="btn btn-success" name="highscore" value="Highscore speichern"/>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>