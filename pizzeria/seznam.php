<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9b018fc7a6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="favicon.ico">
    <title>PIZZA JAK CYP - Seznam objednávek</title>
</head>

<style>
    body{
        overflow:auto;
    }
</style>

<body>
    
<div class="content" style="display: block">
    <nav class="navbar">
        <div class="navbar-logo" id="navbar-logo">
            <div class="logo1"></div>
            <div class="logo2"></div>
        </div>
        <ul class="navbar-links">
            <li><a href="index.php">Úvod</a></li>
            <li><a href="seznam.php">Objednávky</a></li>
            <li><a href="objednavky.php">Objednat</a></li>
        </ul>
    </nav>
 

<hr style="width: 1424px; margin-top: -10px;">

<form action="" method="post" class="filtr">
    <div>
        <div>Podle data</div>
        <input type="date" name="filtered-datum">
    </div>
    <div>
        <div>Podle přijmení</div>
            <select name="filtered-cena">
            <option value="" disabled selected>Vyberte...</option>
                <?php                

                $file = 'zakaznici.txt';
                $f = fopen($file, "r");

                $zobrazena_prijmeni = [];
                while (($radek = fgets($f)) !== false) {
                    list($jm, $pr, $tel, $email, $pizza, $pocet, $karta, $doprava, $datum, $platba) = explode("|", $radek);
                    

                    if (!in_array($pr, $zobrazena_prijmeni)) {
                    $zobrazena_prijmeni[] = $pr;
                    echo "<option value='$pr'>$pr</option>";
                    }
                }
                ?>
            </select>
    </div>
    <div>
        <div>Podle druhu</div>
        
            <select name="filtered-druh">
            <option value="" disabled selected>Vyberte...</option>
                <?php 
                 $file = "nabidka.txt";
                 $f = fopen($file, "r");
                 while (($radek = fgets($f)) !== false) {
                    list($image, $name, $info, $price) = explode("|", $radek);
                    
                    echo "<option value='$name'>$name</option>";

                    }
                ?>
            </select>
    </div>

    <button type="submit" name="submit"><i class="fa-solid fa-filter"></i></button>
</form>


<table class="seznam">
    <div>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Telefon</th>
        <th>Email</th>
        <th>Druh</th>
        <th>Počet kusů</th>
        <th>Věrnostní karta</th>
        <th>Doprava domů</th>
        <th>Datum objednání</th>
        <th>Typ platby</th>
    </div>

    <?php 
            if(isset($_POST["submit"])){
                $tempdate = isset($_POST["filtered-datum"]) ? $_POST["filtered-datum"] : null;
                $filtr2 = isset($_POST["filtered-cena"]) ? $_POST["filtered-cena"] : null;
                $filtr3 = isset($_POST["filtered-druh"]) ? $_POST["filtered-druh"] : null;
                $filtr1 = date("d.m.Y", strtotime($tempdate));

            $file = "zakaznici.txt";
            $f = fopen($file, "r");
            while (($radek = fgets($f)) !== false) {
                list($jm, $pr, $tel, $email, $pizza, $pocet, $karta, $doprava, $datum, $platba) = explode("|", $radek);
            
                if( $filtr1 === $datum ||
                    $filtr2 === $pr ||
                    $filtr3 === $pizza
                ){
                    echo "<tr>";
                        echo "<td>$jm</td>";
                        echo "<td>$pr</td>";
                        echo "<td>$tel</td>";
                        echo "<td>$email</td>";
                        echo "<td>$pizza</td>";
                        echo "<td>$pocet</td>";
                        echo "<td>$karta</td>";
                        echo "<td>$doprava</td>";
                        echo "<td>$datum</td>";
                        echo "<td>$platba</td>";
                    echo "</tr>";
                } 
                }

            } else {
            $file = "zakaznici.txt";
            $f = fopen($file, "r");
                while (($radek = fgets($f)) !== false) {
                    list($jm, $pr, $tel, $email, $pizza, $pocet, $karta, $doprava, $datum, $platba) = explode("|", $radek);
            echo "<tr>";
                echo "<td>$jm</td>";
                echo "<td>$pr</td>";
                echo "<td>$tel</td>";
                echo "<td>$email</td>";
                echo "<td>$pizza</td>";
                echo "<td>$pocet</td>";
                echo "<td>$karta</td>";
                echo "<td>$doprava</td>";
                echo "<td>$datum</td>";
                echo "<td>$platba</td>";
            echo "</tr>";
            }}

    ?>
</table>   
</div> 

        <?php 

        include "footer.php";

        ?>

</body>
</html>
