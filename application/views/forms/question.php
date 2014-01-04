<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
    <div class="container">
        <?php
        $level = $_POST['level'];
        $frage = $_POST['frage'];
        $antwort = $_POST['antwort'];
        $x = $_POST['x'];
        $y = $_POST['y'];
        $send = false;

        // prüft ob die wichtigen Felder des Fragenformulars gefüllt sind.

        if(isset($_POST['submit'])) {
            if(empty($frage)) {
                echo 'Es muss eine Frage eingegeben werden.';
                $send = true;
            }
            if(empty($y) && empty($x)) {
                echo 'Die Koordinaten sind nicht vollst&auml;ndig.';
                $send = true;
            }
            if(!empty($frage) && !empty($y) && !empty($x)) {
                // Wenn das Formular vollständig war dann wird die Frage in die DB geschrieben.
                $frage = '\'' . $frage . '\'';
                $antwort = '\'' . $antwort . '\'';
                $dbH->makeEntry($config['db_table_question'] . ' (level, question, answer , X, Y)', "($level, $frage, $antwort, $x, $y)");
                echo 'Frage erfolgreich abgeschickt.';
            }
        } else {
            $send = true;
        }

        // Wenn ein Feld fehlt oder das Formular zum ersten Mal aufgerufen wird, dann wird das Formular ausgegeben
        if($send): ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                <label for="level">Schwierigkeitsgrad(Level) der Frage:</label>
                <select id="level" name="level">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <label for="frage">Frage:</label>
                <textarea id="frage" name="frage"></textarea>
                <label for="antwort">Antwort (optional):</label>
                <input type="text" id="antwort" name="antwort">
                <label for="x">X Koordinate:</label>
                <input type="text" id="x" name="x">
                <label for="y">Y Koordinate:</label>
                <input type="text" id="y" name="y">

                <input type="submit" name="submit" value="senden"/>
            </form>
        <?php endif; ?>
    </div>
<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>