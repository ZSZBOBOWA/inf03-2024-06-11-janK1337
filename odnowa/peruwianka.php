<?php

$polaczenie = new mysqli('localhost', 'root', '', 'hodowla');

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <section class="baner">
        <h1>Hodowla swinek morskich</h1>
    </section>
    <section class="prawy">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
            $wynik = $polaczenie->query('SELECT rasa FROM rasy;');

            while ($rasa = $wynik->fetch_array()) {
                echo "<li>" . $rasa['rasa'] . "</li>";
            }
            ?>
        </ol>

    </section>
    <div class="lewy">
        <section class="lewyMenu">
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </section>
        <section class="lewyGlowny">

            <img src="../peruwianka.jpg" alt="Swinka morska rasy peruwnaika">
            <?php
            $wynik2 = $polaczenie->query('SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON rasy_id = rasy.id WHERE rasy.id = 1;');

            while ($kl = $wynik2->fetch_array()) {
                echo "<h2>Rasa" . $kl['rasa'] . "</h2>";
                echo "<p>Data urodzenia: " . $kl['data_ur'] . "</p>";
                echo "<p>Oznaczenie miotu:" . $kl['miot'] . "</p>";
            }
            ?>
            <hr>
            <h2>Swinki w tym mocie</h2>
            <?php
            $wynik3 = $polaczenie->query('SELECT imie, cena, opis FROM swinki WHERE rasy_id = 1;');

            while ($k3 = $wynik3->fetch_array()) {
                echo "<h3>" . $k3['imie'] . " - ". $k3['cena'] . "zł</h3>";
                echo "<p>" . $k3['opis'] . "</p>";
            }
            ?>
        </section>
    </div>

    <footer>
        <p>Strone wykonał: 007</p>
    </footer>
</body>

</html>