<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>


<?php $rounds = $config['game_rounds']; ?>
<?php  // TODO Ausgabe von Fragen von den verschiedenen Leveln und zusammenführen als Fragenarray?>
<?php $questions = $dbH->getEntry('question', '*', 'is_live = 1') ?>

<?php $randomKeys = array_rand($questions, $rounds)?>

<?php $result = array();?>
<?php $result[0] = 'first'; ?>
<?php foreach($randomKeys as $key): ?>
    <?php $result[] = $questions[$key]; ?>
<?php endforeach; ?>

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