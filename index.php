<?php session_start(); ?>
<pre>
    <?php echo print_r($_POST ,1)?>
</pre>

<?php //session_unset();?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include('application/views/layout/header.php') ?>

<?php // TODO Übergabe der Variablen und Ausgabe des Ergebnisses (Modal?). Ergebnis wird in die Session gespeichert. ?>

<?php if(isset($_POST['submit']) && $_POST['submit'] = 'L&ouml;sung abgeben'): ?>
    <?php $_SESSION['game']['actualRound'] = $_SESSION['game']['actualRound'] + 1; ?>
    <?php echo $_SESSION['game']['actualRound']; ?>
<?php endif; ?>

<div class="container">
    <div class="col-lg-2 col-md-2 col-sm-2">
<?php  // TODO Ausgabe des Levels der Frage. ?>
        Levelanzeige
	</div>
    <div class="col-lg-8 col-md-8 col-sm-8" >
        <div id="map_canvas"></div>
        <?php if(isset($_SESSION['game']['loaded']) && $_SESSION['game']['loaded'] == 1): ?>
            <?php include('application/views/page/game.php'); ?>
        <?php else: ?>
            <?php include('application/views/page/gameBoot.php'); ?>
            <?php $_SESSION['game']['loaded'] = 1 ?>
        <?php endif; ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">
        <?php // TODO Ausgabe der Highscore Liste?>
        Highscore Tabelle
        <table>
            <tr>
                <td>Rang</td>
                <td>Benutzername</td>
                <td>Pkt.</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Walther</td>
                <td>10400</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sebastian</td>
                <td>10400</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Diana</td>
                <td>10400</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Gamer007</td>
                <td>4100</td>
            </tr>
        </table>
        <?php if(isset($_POST['submit'])): ?>
            <?php include('application/views/page/score.php'); ?>
        <?php endif; ?>
    </div>
</div>

<?php include('application/views/layout/footer.php') ?>