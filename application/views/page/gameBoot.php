<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include('application/views/layout/header.php') ?>


<?php session_start(); ?>
<?php $rounds = $config['game_rounds']; ?>
<?php $questions = $dbH->getEntry('question','*','is_live = 1') ?>

<?php $_SESSION['game']['actualRound'] = 0; ?>
<?php $_SESSION['game']['rounds'] = $rounds; ?>
<?php $_SESSION['game']['questions'] = $questions; ?>
<?php //$_SESSION['game']['result'] ; ?>

<?php $randomKeys = array_rand($questions, $rounds)?>

<?php $result = array();?>
<?php foreach($randomKeys as $key): ?>
    <?php $result[] = $questions[$key]; ?>
<?php endforeach; ?>



<pre>
    <?php echo print_r($_SESSION,1)?>
</pre>

<?php include('game.php'); ?>