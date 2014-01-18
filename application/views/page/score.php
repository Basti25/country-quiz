<?php
    $_SESSION['game']['result'] = $_SESSION['game']['result'] + $game->score(
            $_POST['answerX'],
            $_POST['answerY'],
            $_POST['solutionX'],
            $_POST['solutionY'],
            $config['distanceScore']
        );?>
<?php echo $_SESSION['game']['result']; ?>