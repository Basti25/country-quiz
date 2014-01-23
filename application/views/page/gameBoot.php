<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>


<?php $rounds = $config['game_rounds']; ?>
<?php $questionsPerLevel = $config['questions_per_level']; ?>
<?php $questions = array() ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 1') ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 2') ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 3') ?>

<?php $randomKeys = array()?>

<?php foreach($questions as $key => $questionLevel): ?>
    <?php $randomKeys[] = array_rand($questionLevel, $questionsPerLevel) ?>
<?php endforeach; ?>

<?php $result = array();?>
<?php foreach($randomKeys as $key => $randomArray): ?>
    <?php foreach($randomArray as $rndQuestions): ?>
        <?php $result[] = $questions[$key][$rndQuestions]; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php shuffle($result); ?>

<?php array_unshift($result, 'first')?>

<?php $_SESSION['game']['actualRound'] = 1; ?>
<?php $_SESSION['game']['rounds'] = $rounds; ?>
<?php $_SESSION['game']['questions'] = $result; ?>
<?php $_SESSION['game']['score'] = ''; ?>
<?php $_SESSION['game']['result'] = 0; ?>
<?php $_SESSION['game']['loaded'] = 0; ?>

<?php include('game.php'); ?>

<div id="gameStarter">
    <div class="btn btn-primary" onclick="window.location.reload();">
        Spiel starten
    </div>
</div>