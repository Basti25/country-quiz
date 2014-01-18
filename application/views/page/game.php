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
            <button class="btn btn-primary"onclick="placeAnswerMarker(
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>,
            <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>
                );">
                L&ouml;sung speichern
            </button>

            <form style="display: none;" id="solutionForm" method="post" action="<?php echo $_SERVER['HTTP_ORIGIN']; ?>">

                <input type="hidden" id="answerX" name="answerX" value="0">
                <input type="hidden" id="answerY" name="answerY" value="0">
                <input type="hidden" id="solutionX" name="solutionX" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['X']?>">
                <input type="hidden" id="solutionY" name="solutionY" value="<?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['Y']?>">


                <input type="submit" name="submit" value="weiter"/>
            </form>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php include('gameEnd.php') ?>
<?php endif; ?>