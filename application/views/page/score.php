<?php if($_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds'] +1): ?>
    <?php $_SESSION['game']['result'] = (int) $_SESSION['game']['result'] + $game->score(
                $_POST['answerX'],
                $_POST['answerY'],
                $_POST['solutionX'],
                $_POST['solutionY'],
                $config['distanceScore']
            );?>

<?php endif; ?>

<?php echo (int) $_SESSION['game']['result']; ?>
<?php   $_POST['answerX'] = 0;
        $_POST['answerY'] = 0;
        $_POST['solutionX'] = 0;
        $_POST['solutionY']= 0;
?>