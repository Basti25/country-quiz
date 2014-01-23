<?php session_start(); ?>

<?php //session_unset();?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include('application/views/layout/header.php') ?>

<?php if(isset($_POST['submit'])): ?>
    <?php include('application/views/page/score.php'); ?>
    <?php $_SESSION['game']['actualRound'] = $_SESSION['game']['actualRound'] + 1; ?>
<?php endif; ?>

<div class="container">
    <div class="col-lg-8 col-md-8 col-sm-8" >
        <div id="question">
            <?php if($_SESSION['game']['loaded'] == 1 && $_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
                <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['question']?>
            <?php endif; ?>
        </div>
        <div id="map_canvas"></div>
        <?php if(isset($_SESSION['game']['loaded']) && $_SESSION['game']['loaded'] == 1): ?>
            <?php include('application/views/page/game.php'); ?>
        <?php else: ?>
            <?php include('application/views/page/gameBoot.php'); ?>
            <?php $_SESSION['game']['loaded'] = 1 ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <?php include('application/views/page/highscore.php'); ?>

        Dein Punktestand:
        <?php if($_SESSION['game']['actualRound'] > 1 && $_SESSION['game']['loaded'] == 1): ?>
            <?php echo (int) $_SESSION['game']['result']; ?>
        <?php endif; ?>
    </div>
</div>

<?php include('application/views/layout/footer.php') ?>