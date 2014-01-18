<?php if($_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
    <div id="gameContainer">
        <div id="question">
            <?php if($_SESSION['game']['loaded'] == 1): ?>
                <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['question']?>
            <?php endif; ?>
        </div>
        <div id="answer">
            <?php if($_SESSION['game']['loaded'] == 1): ?>
                <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['answer']?>
            <?php endif; ?>
        </div>
        <?php if($_SESSION['game']['loaded'] == 1): ?>
            <pre>
                <?php echo print_r($_POST ,1)?>
            </pre>

            <button class="btn btn-primary"onclick="placeAnswerMarker(
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>,
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>
                );">
                L&ouml;sung anzeigen
            </button>

            <form style="display: none;" id="solutionForm" method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

                <input type="hidden" id="answerX" name="answerX" value="0">
                <input type="hidden" id="answerY" name="answerY" value="0">
                <input type="hidden" id="solutionX" name="solutionX" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>">
                <input type="hidden" id="solutionY" name="solutionY" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>">


                <input type="submit" name="submit" value="L&ouml;sung abgeben"/>
            </form>
            <?php // TODO Übergabe der Variablen und Ausgabe des Ergebnisses (Modal?). Ergebnis wird in die Session zwischengespeichert. ?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php include('gameEnd.php') ?>
    <?php // TODO Ende des Spiels. Ausgabe des Resultsats und Eingabe eines Names. Wurde der Name eingegeben wird das Ergebnis in die DB gespeichert. Löschen der Session. ?>
<?php endif; ?>