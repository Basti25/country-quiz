<?php
$name = $_POST['name'];
$score = $_SESSION['game']['score'];
$send = false;

// prüft ob die wichtigen Felder des Fragenformulars gefüllt sind.

if(isset($_POST['submit'])) {
    if(empty($name)) {
        echo 'Es muss ein Name für den Highscore eingegeben werden.';
        $send = true;
    }
    if(!empty($name)) {
        // Wenn das Formular vollständig war dann wird die Frage in die DB geschrieben.
        $dbH->makeEntry('highscore (user, score)', "('$name', 1233)");
        echo 'Highscore erfolgreich abgeschickt.';
    }
} else {
    $send = true;
}

// Wenn ein Feld fehlt oder das Formular zum ersten Mal aufgerufen wird, dann wird das Formular ausgegeben
if($send): ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <input type="submit" name="submit" value="senden"/>
    </form>
<?php endif; ?>
