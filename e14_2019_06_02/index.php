<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <section id="top">
        <h1>W naszej hurtowni kupujesz najtaniej</h1>
    </section>

    <section id="left">
        <h3>Ceny wybranych artykolow w hurtowni:</h3>

        <table>
    <?php 
        $conn1 = mysqli_connect("localhost", "root", "", "sklep");
        $zapytanie1 = "SELECT nazwa, cena FROM towary LIMIT 4;";
        $query1 = mysqli_query($conn1, $zapytanie1);
        while($wynik = mysqli_fetch_row($query1))
        {
    echo        "<td>".$wynik[0]."</td>";
    echo        "<td>".$wynik[1]."</td>";
    echo    "</tr>";
        }
        mysqli_close($conn1);
    ?>
        </table>

    </section>

    <section id="mid">
        <h3>Ile będą kosztować Twoje zakupy?</h3>
        <form action="index.php" method="post">
            wybierz artykuł
            <select name="wybierz">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
                <option value="Ekierka">Ekierka</option>
                <option value="Linijka 50 cm">Linijka 50 cm</option>
            </select>
            <br>
            liczba sztuk:
            <input type="number" name="numery" value="1">
            <br>
            <button type="submit">OBLICZ</button>
        </form>

    <?php 

if(isset($_POST["wybierz"]))
            {
                $conn2 = mysqli_connect("localhost", "root", "", "sklep");
                $nazwaproduktu = $_POST["wybierz"];
                $iloscsztuk = $_POST["numery"];
                $zapytanie2 = "SELECT cena FROM towary Where nazwa = '$nazwaproduktu'";
                $query2 = mysqli_query($conn2, $zapytanie2);
                while($wynik = mysqli_fetch_row($query2))
                {
                    echo round($wynik[0] * $iloscsztuk, 2);
                }
                mysqli_close($conn2);
            }
    ?>

    </section>

    <section id="right">
        <img src="zakupy2.png" alt="">
        <h3>Kontakt</h3>
        <p>telefon:<br> 111222333 <br>e-mail: <br><a href="mailto: hurt@wp.pl ">hurt@wp.pl</a></p>
    </section>

    <section id="down">
        <h4>Witrynę wykonał - Dawid Olesinski pesel</h4>
    </section>

</body>

</html>