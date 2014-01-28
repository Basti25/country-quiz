<?php // Startet die Session. Diese wird später in der GameBoot gefüllt.?>
<?php session_start(); ?>

<?php // HTML5 Doctype ?>
<!DOCTYPE html>

<?php // Einbinden der boot.php zum initalisieren und starten der wichtigsten Funktionen. ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php // Lädt den Header in die Seite. ?>
<?php include('application/views/layout/header.php') ?>

<?php // Wenn man zur nächsten Frage klickt wird die aktuelle Puntzahl ausgerechnet und die aktuelle Runde um 1 erhöht. ?>
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
                            <?php // Im laufenden Spiel werden hier die Fragen ausgegeben.
                                  // Anhand der aktuellen Runde kann in der Session die Frage ausgelesen werden.
                                  // Ist das Spiel zu Ende wird sich für das mitspielen bedankt.
                                  // Ist das Spiel nicht gestartet wird man auf der Seite begrüßt. ?>
                            <?php if($_SESSION['game']['loaded'] == 1 && $_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
                                <?php echo $_SESSION['game']['questions'][$_SESSION['game']['actualRound']]['question']?>
                            <?php elseif($_SESSION['game']['actualRound'] > $_SESSION['game']['rounds']): ?>
                                Vielen Dank f&uuml;rs Mitspielen!
                            <?php else: ?>
                                Willkommen!
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php // Hier wird die Googlekarte ausgegeben. ?>
                <div id="map_canvas"></div>
                <?php // Ist das Spiel geladen geht es gleich zu den Spielelementen zum Lösung speichern.
                      // Ist das Spiel nicht geladen wird die gameBoot.php geladen. Die sorgt für die Initalisierung des Spiels. ?>
                <?php if(isset($_SESSION['game']['loaded']) && $_SESSION['game']['loaded'] == 1): ?>
                    <?php include('application/views/page/game.php'); ?>
                <?php else: ?>
                    <?php include('application/views/page/gameBoot.php'); ?>
                    <?php $_SESSION['game']['loaded'] = 1 ?>
                <?php endif; ?>
            </div>

            <?php // Ausgabe der Highscoreliste und des Punktestands ?>
            <div id="highscore">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="visible-xs">
                        <?php // Ausgabe des Punktestands über der Highscoreliste bei der Handyansicht ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Dein Punktestand:
                                <?php // Beim laufenden Spiel wird hier der aktuelle Punktestand angezeigt. ?>
                                <?php if($_SESSION['game']['actualRound'] > 1 && $_SESSION['game']['loaded'] == 1): ?>
                                    <?php echo (int) $_SESSION['game']['result']; ?>
                                <?php else: ?>
                                    0
                                <?php endif; ?>
                                <?php // Beim laufenden Spiel wird hier die aktuelle Runde und die maximale Rundenzahl ausgegeben. ?>
                                <?php if($_SESSION['game']['loaded'] == 1
                                    && $_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
                                    <br/>
                                    Runde:
                                    <?php echo $_SESSION['game']['actualRound']; ?>
                                    /
                                    <?php echo $_SESSION['game']['rounds']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php // Einbinden der Highscoretabelle ?>
                            <?php include('application/views/page/highscore.php'); ?>
                        </div>
                    </div>
                    <div class="hidden-xs">
                        <?php // Ausgabe des Punktestands bei größeren Auflösungen ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Dein Punktestand:
                                <?php if($_SESSION['game']['actualRound'] > 1 && $_SESSION['game']['loaded'] == 1): ?>
                                    <?php echo (int) $_SESSION['game']['result']; ?>
                                <?php else: ?>
                                    0
                                <?php endif; ?>
                                <?php // Beim laufenden Spiel wird hier die aktuelle Runde und die maximale Rundenzahl ausgegeben. ?>
                                <?php if($_SESSION['game']['loaded'] == 1
                                        && $_SESSION['game']['actualRound'] <= $_SESSION['game']['rounds']): ?>
                                    <br/>
                                    Runde:
                                    <?php echo $_SESSION['game']['actualRound']; ?>
                                    /
                                    <?php echo $_SESSION['game']['rounds']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // Lädt den Footer in die Seite. ?>
<?php include('application/views/layout/footer.php') ?>