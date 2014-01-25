<?php session_start(); ?>
<!DOCTYPE html>
<?php //session_unset();?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include('application/views/layout/header.php') ?>

<?php if(isset($_POST['submit'])): ?>
    <?php include('application/views/page/score.php'); ?>
    <?php $_SESSION['game']['actualRound'] = $_SESSION['game']['actualRound'] + 1; ?>
<?php endif; ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8" >
                <div id="question">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if($_SESSION['game']['loaded'] == 1 && $_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
                                <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['question']?>
                            <?php elseif($_SESSION['game']['actualRound'] > $_SESSION['game']['rounds']): ?>
                                Vielen Dank fürs Mitspielen!
                            <?php else: ?>
                                Willkommen!
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="map_canvas"></div>
                <?php if(isset($_SESSION['game']['loaded']) && $_SESSION['game']['loaded'] == 1): ?>
                    <?php include('application/views/page/game.php'); ?>
                <?php else: ?>
                    <?php include('application/views/page/gameBoot.php'); ?>
                    <?php $_SESSION['game']['loaded'] = 1 ?>
                <?php endif; ?>
            </div>
            <div id="highscore">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="visible-xs">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Dein Punktestand:
                                <?php if($_SESSION['game']['actualRound'] > 1 && $_SESSION['game']['loaded'] == 1): ?>
                                    <?php echo (int) $_SESSION['game']['result']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php include('application/views/page/highscore.php'); ?>
                        </div>
                    </div>
                    <div class="hidden-xs">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Dein Punktestand:
                                <?php if($_SESSION['game']['actualRound'] > 1 && $_SESSION['game']['loaded'] == 1): ?>
                                    <?php echo (int) $_SESSION['game']['result']; ?>
                                <?php else: ?>
                                    0
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('application/views/layout/footer.php') ?>