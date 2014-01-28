<?php // Die Funktion wird ausgeführt wenn das Spiel läuft. ?>
<?php if($_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds'] +1): ?>
    <?php // Der aktuelle Wert des Punktestandes wird mit dem Ergebnis der Frage addiert und
          // überschreibt den alten Punktestand in der Session. ?>
    <?php $_SESSION['game']['result'] = (int) $_SESSION['game']['result'] + $game->score(
            $_POST['answerX'],
            $_POST['answerY'],
            $_POST['solutionX'],
            $_POST['solutionY'],
            $config['distanceScore'],
            $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['level']
            );?>

<?php endif; ?>
<?php // Die Koordinaten werden auf 0 gesetzt um zu verhindern das falsche Koordinaten in die nächste Frage übernommen werden.?>
<?php   $_POST['answerX'] = 0;
        $_POST['answerY'] = 0;
        $_POST['solutionX'] = 0;
        $_POST['solutionY']= 0;
?>