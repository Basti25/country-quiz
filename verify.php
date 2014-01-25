<?php $authed_users = array("test" => "test");

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

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
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
        Neue Fragen hinzugefügt.
    <?php endif; ?>

        <?php // Holt die nicht freigeschalteten Fragen aus der DB und gibt diese in einer Auswahl aus. ?>
        <?php $notVerfifiedQuestions = $dbH->getEntry($config['db_table_question'], '*', 'is_live is NULL') ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php foreach($notVerfifiedQuestions as $notVerfifiedQuestion):?>
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
            <br/>

        <?php endforeach; ?>
            <input type="submit" name="submit" value="freischalten"/>
        </form>
    </div>
</div>

<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>