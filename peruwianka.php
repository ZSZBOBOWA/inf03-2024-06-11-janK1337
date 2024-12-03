<?php 
$polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla')

?>



<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hodowla świnek morskich</title>

    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <section class="baner">
        <h1>Hodowla świnek morskich - zamów świnkowe maluszk</h1>
    </section>
    <section class="prawy1">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php 
            $wynik=$polaczenie->query('SELECT rasa FROM rasy;');
            
            while ($rasa = $wynik->fetch_array()){
                echo "<li>".$rasa['rasa']."</li>";
            }
            
            ?>
        </ol>
    </section>
    <section class="lewyMenu">
    <a href="peruwianka.php">Rasa Peruwianka</a>
    <a href="american.php">Rasa American</a>
    <a href="crested.php">Rasa Crested</a>
    </section>

    <section class="lewyGlowny">
        <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
        <?php 
            $wynik2=$polaczenie->query('SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON rasy_id = rasy.id WHERE rasy.id = 1;');
            
            while ($rasa = $wynik2->fetch_array()){
                echo "<h2>Rasa: ".$rasa['rasa']."</h2>";
                echo "<p>Data urodzenia: ".$rasa['data_ur']."</p>";
                echo "<p>Oznaczenie miotu: ".$rasa['miot']."</p>";
            }
            
            ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php 
            $wynik2=$polaczenie->query('SELECT imie, cena, opis FROM swinki WHERE rasy_id = 1;');
            
            while ($rasa = $wynik2->fetch_array()){
                echo "<h3>Imie: ".$rasa['imie']." - ". $rasa['cena'] ."</h3>";
                echo "<p>Opis: ".$rasa['opis']."</p>";
            }
            
            ?>
        
    </section>



    <footer>Stronę wykonał: 007</footer>
</body>

</html>