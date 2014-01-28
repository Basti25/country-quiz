<?php // Hier wird die Session für das Spiel eingerichtet.?>

<?php // Die maximalen Runden des Spiels ?>
<?php $rounds = $config['game_rounds']; ?>
<?php // Die Anzahl der Fragen pro Level ?>
<?php $questionsPerLevel = $config['questions_per_level']; ?>
<?php // Array für die Fragen. Die Datenbankklasse erstellt eine Verbindung und holt alle Einträger der einzelnen Levels ?>
<?php $questions = array() ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 1') ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 2') ?>
<?php $questions[] = $dbH->getEntry('question', '*', 'is_live = 1 AND level = 3') ?>

<?php // Array für die zufälligen Fragen jedes Levels.?>
<?php $randomKeys = array()?>

<?php // Jedes Fragenarray wird durchgegangen und eine Anzahl, definiert durch die Anzahl der Fragen pro Level in der config,
      // zufälliger Indizies in das %randomKeys Array geschrieben. ?>
<?php foreach($questions as $key => $questionLevel): ?>
    <?php $randomKeys[] = array_rand($questionLevel, $questionsPerLevel) ?>
<?php endforeach; ?>

<?php // $result speichert die Fragen zwischen. ?>
<?php $result = array();?>
<?php // Die zufälligen Indizies der einzelnen Fragenlevels werden nun genutzt um nun gezielt zufällig gewählten Fragen
      // zu holen und in das $result Array zu schreiben. ?>
<?php foreach($randomKeys as $key => $randomArray): ?>
    <?php foreach($randomArray as $rndQuestions): ?>
        <?php $result[] = $questions[$key][$rndQuestions]; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php // Die Fragen werden durchgemischt. ?>
<?php shuffle($result); ?>

<?php // An erster Stelle kommt der 'first' Eintrag. Der sorgt für die richtige Ausgabe der Arrays, passend zur aktuellen Runde. ?>
<?php array_unshift($result, 'first')?>

<?php // Die einzelnen Werte werden in der Session gespeichert. ?>
<?php $_SESSION['game']['actualRound'] = 1; ?>
<?php $_SESSION['game']['rounds'] = $rounds; ?>
<?php $_SESSION['game']['questions'] = $result; ?>
<?php $_SESSION['game']['score'] = ''; ?>
<?php $_SESSION['game']['result'] = 0; ?>
<?php $_SESSION['game']['loaded'] = 0; ?>

<?php // Lädt die Seite neu und initalisiert den Start der 1. Frage anhand der in der Session eingetragenen Werte. ?>
<div id="gameStarter">
    <div class="btn btn-primary" onclick="window.location.reload();">
        Spiel starten
    </div>
</div>