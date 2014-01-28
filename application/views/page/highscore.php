<?php // Holt sich alle Einträge der Highscoreliste. Absteigend sortiert nach dem höchsten Punktestand. ?>
<?php $highscoreList = $dbH->getEntry('highscore', '*', '', 'score DESC') ?>

<table class="table table-condensed">
    <tr>
        <th>Rang</th>
        <th>Benutzername</th>
        <th>Pkt.</th>
    </tr>
<?php // Ausgabe der Highscoreliste?>
<?php foreach($highscoreList as $key => $highscoreEntry): ?>
    <tr>
        <td><?php echo ++$key; ?>.</td>
        <td><?php echo $highscoreEntry['user']?></td>
        <td><?php echo $highscoreEntry['score']?></td>
    </tr>
    <?php if($key == $config['highscore_list_entry']): ?>
        <?php // Wenn die maximale Anzahl an Einträgen erreicht wurden, wird die Ausgabe gestoppt.
              // Maximale Anzahl der Einträge wird in der config definiert. ?>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>
</table>