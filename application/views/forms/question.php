<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
    <div class="container">
        <?php
        $frage = $_POST['frage'];
        $send = false;

        if(isset($_POST['submit'])) {
            if(empty($frage)) {
                echo 'Es muss eine Frage eingegeben werden.';
                $send = true;
            }
            if(!empty($frage)) {
                echo 'Frage erfolgreich abgeschickt.';
            }
        } else {
            $send = true;
        }
        if($send): ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                <label for="frage">Frage:</label>
                <textarea id="frage" name="frage">

                </textarea>
                <input type="submit" name="submit" value="senden"/>
            </form>
        <?php endif; ?>
    </div>
<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>