<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
<div class="container">

<?php if(isset($_POST['submit'])): ?>
    <?php foreach($_POST['verify'] as $verify): ?>
        <?php $dbH->updateEntry($config['db_table_question'], 'is_live=1', 'id=' . $verify) ?>
    <?php endforeach; ?>
    Neue Fragen hinzugefügt.
<?php endif; ?>

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
<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>