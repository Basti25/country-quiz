<?php if($_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
    <?php // befinden wir uns noch im laufenden Spiel wird der Lösung speichern Button eingefügt. ?>
    <div id="gameContainer">
        <?php if($_SESSION['game']['loaded'] == 1): ?>
            <button id="placeAnswerMarker" class="btn btn-primary"onclick="placeAnswerMarker(
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>,
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>
                );">
                L&ouml;sung speichern
            </button>

            <?php // #solutionForm ist standardmässig ausgeblendet. Es wird eingeblendet durch die "placeAnswerMarker"
                  // Funktion. Dieses Formular übergibt die eingegebenen Standortdaten an den Webserver der daraus dann
                  // die Entfernung und den Punktestand errechnen kann. ?>
            <form id="solutionForm" method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

                <?php // answerX und answerY werden durch die "placeAnswerMarker" Funktion mit den Koordinaten des Antwortmarkers gefüllt.?>
                <input type="hidden" id="answerX" name="answerX" value="0">
                <input type="hidden" id="answerY" name="answerY" value="0">
                <?php // solutionX und solutionY werden von der aktuellen Frage befüllt. Die Infos sind in der Session gespeichert. ?>
                <input type="hidden" id="solutionX" name="solutionX" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>">
                <input type="hidden" id="solutionY" name="solutionY" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>">

                <input type="submit" name="submit" class="btn btn-primary" value="weiter"/>
            </form>
        <?php endif; ?>
        <?php // #answer ist standardmässig ausgeblendet und wird durch die "placeAnswerMarker" Funktion angezeigt. ?>
        <div id="answer">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['answer']?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php // Wenn das Spiel vorbei ist wird die gameEnd.php eingebunden. ?>
    <?php include('gameEnd.php') ?>
<?php endif; ?>