<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
<?php include('application/views/layout/header.php') ?>

<div class="container">
    <div class="col-lg-2 col-md-2 col-sm-2">
        Levelanzeige


    </div>
    <div class="col-lg-8 col-md-8 col-sm-8">
        Platz für das Canvas


    </div>
    <div class="col-lg-2 col-md-2 col-sm-2">
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
    </div>
</div>

<?php include('application/views/layout/footer.php') ?>

