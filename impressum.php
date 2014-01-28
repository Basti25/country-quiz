<?php // Einbinden der boot.php zum initalisieren und starten der wichtigsten Funktionen. ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php // Lädt den Header in die Seite. ?>
<?php include($config['rootpath'] . 'application/views/layout/header.php') ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="impressum">
                    <h1>Impressum</h1>
                    <p>Verantwortlich f&uuml;r den Inhalt dieser Seite ist: <br/>
                        Fachhochschule Brandenburg <br/>
                        Magdeburger Str. 50 <br/>
                        14770 Brandenburg an der Havel <br/>
                        Deutschland <br/>
                    </p>
                    <p>
                        Kontakt unter: <br/>
                        Email: info@fh-brandenburg.de <br/>
                        Telefon: +49 (0) 3381 / 355 - 0 <br/>
                    </p>
                    <h3>
                        Rechtliche Hinweise:
                    </h3>
                    <p>
                        P.R.W. beh&auml;lt sich alles Rechte an den eigenen redaktionellen Texten, eigenen Bildern, eigenen Grafiken sowie an dem gesamten Design inklusive Layout-, Schrift- und Farbgestaltung der Websites vor. Die Vervielf&auml;ltigung und Verwendung dieser Informationen und/oder Daten sowie jegliche Art von Kopie oder Reproduktion bedarf der vorherigen schriftlichen Zustimmung vom P.R.W.
                        F&uuml;r Inhalte externer Links bzw. Webseiten kann P.R.W. keine Verantwortung &uuml;bernehmen und distanziert sich von diesen Inhalten ausdr&uuml;cklich. Ausgeschlossen ist auch eine Haftung oder Garantie f&uuml;r die Aktualit&auml;t, Richtigkeit und Vollst&auml;ndigkeit der zur Verf&uuml;gung gestellten Informationen. Alle Bilder, Grafiken, Texte sowie das gesamte Design sind mit allen Rechten von P.R.W. vorbehalten.
                    </p>
                    <h3>
                        Datenschutz:
                    </h3>
                    <p>
                        P.R.W. nimmt den Schutz Ihrer pers&ouml;nlichen Daten sehr ernst und halten uns strikt an die Regeln der Datenschutzgesetze. Personenbezogene Daten werden auf dieser Webseite nur im technisch notwendigen Umfang erhoben. In keinem Fall werden die erhobenen Daten verkauft oder aus anderen Gr&uuml;nden an Dritte weitergegeben.
                    </p>
                    <h3>
                        Haftungsausschuss:
                    </h3>
                    <p>
                        P.R.W. haftet nicht f&uuml;r den Inhalt der Ver&ouml;ffentlichungen der Nutzer; dies gilt insbesondere f&uuml;r F&auml;lle, in denen die von Nutzern eingestellten Inhalte gegen das geistige Eigentum (Markenrechte, Urheberrechte, etc.) oder gegen das Pers&ouml;nlichkeitsrecht Dritter versto&szlig;en. Dieser Haftungsausschuss gilt gleicherma&szlig;en f&uuml;r Inhalte von Internetseiten, welche von den Nutzern ohne Kenntnis von P.R.W. verlinkt wurden. P.R.W. &uuml;bernimmt daher keine Gew&auml;hr f&uuml;r die Aktualit&auml;t, Richtigkeit, Vollst&auml;ndigkeit oder Qualit&auml;t der dort bereitgestellten Informationen und distanziert sich hiermit ausdr&uuml;cklich von diesen Inhalten. P.R.W. hat die verlinkten Seiten zum Zeitpunkt der Verlinkung genauestens auf die Einhaltung der Bestimmungen zum Jugendschutz und auf etwaige Rechtsverst&ouml;&szlig;e gepr&uuml;ft. Jugendgef&auml;hrdende oder rechtswidrige Inhalte auf den verlinkten Seiten waren zum Zeitpunkt der Verlinkung nicht erkennbar. Allerdings hat P.R.W. auf die Inhalte der verlinkten fremden Seiten keinen Einfluss. Eine st&auml;ndige inhaltliche Kontrolle der von Nutzern eingestellten Inhalte sowie der verlinkten fremden Seiten ist P.R.W. nicht m&ouml;glich und ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Sobald P.R.W. jedoch jugendgef&auml;hrdende Inhalte oder Rechtsverletzungen auf den verlinkten fremden Seiten bekannt werden sollten, werden diese Links unverz&uuml;glich entfernt
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // Lädt den Footer in die Seite. ?>
<?php include($config['rootpath'] . 'application/views/layout/footer.php') ?>