<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9b018fc7a6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="favicon.ico">
    <title>PIZZA JAK CYP - Objednejte si ještě dnes!</title>
    
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
</div>

    <hr>

    <form action="" method="post" class="objednavka-formular">
        <table class="formular-objednavky">
       
        <td><label class="label">Vaše jméno: *</label><input class="input-radek" type="text" name="jmeno" placeholder="Vaše jméno" maxlength="15" autocomplete="off" required></td>
        <tr></tr>
        
        <td><label class="label">Vaše přijmení: *</label><input class="input-radek" type="text" name="prijmeni" placeholder="Vaše přijmení" maxlength="20" autocomplete="off"required></td>
        <tr></tr>
        
        <td><label class="label">Vaše telefoní číslo: *</label><input class="input-radek" type="tel" name="telefon" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" autocomplete="off"placeholder="např. 123-456-789" required></td>
        <tr></tr>
       
        <td> <label class="label">Vaše e-mail:</label><input class="input-radek" type="email" name="email"autocomplete="off"></td>
        <tr></tr>
        
        <td><label class="label">Vyberte pizzu:</label><select class="input-radek-select" name="pizza">
            <?php 
                $file = 'nabidka.txt';

                $f = fopen($file, "r");
        
                while(($radek = fgets($f))!== false){
                list($image, $name, $info, $price) = explode("|", $radek);

                    echo "<option value='$name'>$name</option>";

                }
                fclose($f);
            ?>

        </select></td>
        <tr></tr>
        <td><label class="label">Počet kusů:</label><input class="input-radek" type="number" min="1" max="10" value="1" name="pocetks"></td>
        <tr></tr>
        <td><label class="label">Věrnostní karta:</label></td>

        <tr class="mezera">
        <th><label class="label">Ano</label></th>
        <th><label class="label">Ne</label></th>
        </tr>

        <tr class="mezera">
        <th><input class="radio" type="radio" name="karta" value="ano"></th>
        <th><input class="radio" type="radio" name="karta" value="ne" checked></th>
        </tr>
        
        <td><label class="label">Doprava domů:</label><input class="checkbox" type="checkbox" name="doprava"></td>
        <tr></tr>
        
        <td>
    <label class="label">Předobjednat:</label>
    <input class="checkbox" type="checkbox" name="predobjednat" onclick="toggleCheckbox()">
        </td>
        <tr></tr>
        <td class="dateField" style="display: none;">
    <label class="label">Zadejte datum:</label>
    <input type="date" name="datum">
        </td>

            <script>
                function toggleCheckbox() {
                const checkbox = document.querySelector('input[name="predobjednat"]');
                const dateField = document.getElementsByClassName('dateField')[0]; 

                if (checkbox.checked) {
                    dateField.style.display = 'table-cell';
                } else {
                    dateField.style.display = 'none'; 
                }
            }
            </script>
            
        <tr></tr>
        <td><label class="label">Platba hotově:<i class="fa-regular fa-money-bill-1"></i></label><input type="radio" name="platba" value="hotovost" checked>
        <label class="label">Platba kartou:<i class="fa-regular fa-credit-card"></i></label>
        <input type="radio" name="platba" value="karta"></td>
        <tr></tr>
        <td><input class="submit" type="submit" name="submit" value="Odeslat"></td>
        <td><input class="reset" type="reset" name="reset" value="Smazat"></td>
        <tr></tr>
        </table>
    </form>
</div>

<?php 

    if(isset($_POST['submit'])){
    $jm = $_POST['jmeno'];
    $pr = $_POST['prijmeni'];
    $tel = $_POST['telefon'];
    $email = $_POST['email'];
    $food = $_POST['pizza'];
    $pct = $_POST['pocetks'];
    $karta = $_POST['karta'];
    $dop = $_POST['doprava'] ? 'Doprava' : 'Bez dopravy';;

    if (!empty($_POST['datum'])) {
        $tempdate = $_POST['datum']; 
    } else {
        $tempdate = date("Y-m-d");
    }
    $date = date("d.m.Y", strtotime($tempdate));
    $platba = $_POST['platba'];

    $file = 'zakaznici.txt';
    $f = fopen($file, "a");

    if (!file_exists($file)) {
    } else {
        $txt = "$jm|$pr|$tel|$email|$food|$pct|$karta|$dop|$date|$platba|\n";

        fwrite($f, $txt);
    }

    fclose($f);
}
?>

<?php 

include "footer.php";

?>
</body>
</html>