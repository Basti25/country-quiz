<?php $authed_users = array("test" => "test");

// Loginabfrage für das Verifizierungsformular
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm='Wizmo'");
    header("HTTP/1.0 401 Unauthorized");
    die('restricted area.');
} else {
    if (($authed_users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW'])
        || ($authed_users[$_SERVER['PHP_AUTH_USER']] == "" || $_SERVER['PHP_AUTH_PW'] == "")
    ) {
        unset($_SERVER['PHP_AUTH_PW']);
        unset($_SERVER['PHP_AUTH_USER']);
        echo('Der Login war fehlerhaft, Zugriff verweigert.');
        exit();
    }
}; ?>

<?php // Einbinden der boot.php zum initalisieren und starten der wichtigsten Funktionen. ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php // Lädt den Header in die Seite. ?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
<div class="content">
    <div class="container">

    <?php // prüft ob das Formular abgesendet wurde oder nicht.
          // Abgesendet: schaltet die Fragen frei
    ?>
    <?php if(isset($_POST['submit'])): ?>
        <?php foreach($_POST['verify'] as $verify): ?>
            <?php $dbH->updateEntry($config['db_table_question'], 'is_live=1', 'id=' . $verify) ?>
        <?php endforeach; ?>
        Neue Frage/n hinzugefügt.
    <?php endif; ?>

    <?php // prüft ob das Formular abgesendet wurde oder nicht.
          // Abgesendet: lösche die Fragen
    ?>
    <?php if(isset($_POST['delete'])): ?>
        <?php foreach($_POST['verify'] as $verify): ?>
            <?php $dbH->deleteEntry($config['db_table_question'], 'id=' . $verify) ?>
        <?php endforeach; ?>
        Frage/n gelöscht.
    <?php endif; ?>

        <?php // Holt die nicht freigeschalteten Fragen aus der DB und gibt diese in einer Auswahl aus. ?>
        <?php $notVerfifiedQuestions = $dbH->getEntry($config['db_table_question'], '*', 'is_live is NULL') ?>
        <form id="verifiyForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php foreach($notVerfifiedQuestions as $notVerfifiedQuestion):?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="checkbox" value="<?php echo $notVerfifiedQuestion['id']?>" name="verify[]"/>
                    Frage:
                    <?php echo $notVerfifiedQuestion['question'] ?>
                    <br/>
                    Antwort:
                    <?php echo $notVerfifiedQuestion['answer'] ?>
                    <br/>
                    Koordinaten:
                    <?php echo $notVerfifiedQuestion['X'] ?>
                    <?php echo $notVerfifiedQuestion['Y'] ?>
                </div>
            </div>
        <?php endforeach; ?>
            <?php // für die Freischaltung der Fragen?>
            <input type="submit" class="btn btn-info" name="submit" value="freischalten"/>
            <?php // zum löschen der Fragen?>
            <input type="submit" class="btn btn-danger" name="delete" value="löschen"/>
        </form>
    </div>
</div>

<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>