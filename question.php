<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
<div class="content">
    <div class="container">
        <div id="questionForm">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h1>Frage einsenden</h1>
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

                        <form id="questionForm" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="level">Schwierigkeitsgrad(Level) der Frage:</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select id="level" name="level">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="hidden-xs col-lg-2 col-md-2 col-sm-2"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="frage">Frage:</label>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <textarea id="frage" name="frage" class="form-control"></textarea>
                                </div>
                                <div class="hidden-xs col-lg-2 col-md-2 col-sm-2"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="antwort">Antwort (optional):</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" id="antwort" name="antwort" class="form-control">
                                </div>
                                <div class="hidden-xs col-lg-2 col-md-2 col-sm-2"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="x">X Koordinate:</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" id="x" name="x" class="form-control">
                                </div>
                                <div class="hidden-xs col-lg-2 col-md-2 col-sm-2"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <label for="y">Y Koordinate:</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" id="y" name="y" class="form-control">
                                </div>
                                <div class="hidden-xs col-lg-2 col-md-2 col-sm-2"></div>
                            </div>

                            <input type="submit" class="btn btn-primary" name="submit" value="Frage einsenden"/>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>