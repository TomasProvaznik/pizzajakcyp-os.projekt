<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9b018fc7a6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="favicon.ico">
    <title>PIZZERIA FAJNŠMEKR</title>
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
    <hr>
        <div class="service-aspects">
            <div class="service-aspects-bubble">
                <div><i class="fa-solid fa-truck"></i></div>
                <div>
                    <div class="service-aspects-bubble-header">Rozvoz od 29Kč</div>
                    <div class="service-aspects-bubble-lilheader">Naši lahodnou pizzu rozvážíme po Havířově a okolí.</div>
                </div>
            </div>
            <div class="service-aspects-bubble">
                <div><i class="fa-solid fa-clock"></i></div>
                <div>
                    <div class="service-aspects-bubble-header">Doručení do 60 minut</div>
                    <div class="service-aspects-bubble-lilheader">Pizzu ti stihneme dovézt ještě horkou do hodiny od objednání.</div>   
                </div>
                
            </div>
            <div class="service-aspects-bubble">
                <div><i class="fa-solid fa-pizza-slice"></i></div>
                <div>
                    <div class="service-aspects-bubble-header">Záruka kvality</div>
                    <div class="service-aspects-bubble-lilheader">Pečeme pouze z kvalitních a čerstvých surovin.</div>
                </div>
                    
            </div>
        </div>
        <hr width="1024"></hr>
            <span class="span-jentak">Nejlepší pizza ve městě</span>

            <form action="hledani.php" method="GET">
                <div>
                    <input type="text" name="vyhledavani" max="20" placeholder="Zadejte ingredienci, kterou chcete, aby pizza obsahovala." autocomplete="off">
                    <button type="submit" name="odeslat-vyhledavani"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

        <div class="pizza-list" id="pizza-list">

        <script src="intro.js"></script>  
            
        <?php 

        $takjsmetuneconasli = 0;

    $hledani = isset($_GET["vyhledavani"]);
    $hledani = mb_strtolower(trim($_GET["vyhledavani"]), 'UTF-8');


    $file = 'nabidka.txt';
    if (!file_exists($file)) {
        echo '<div class="pizza-list-error">
            <h1>OMLOUVÁME SE <i class="fa-solid fa-heart-crack"></i></h1>
            <hr>
            <div>Bohužel Vám musíme sdělit, že naše nabídka není nyní dostupná. Co nevidět to opravíme! Děkujeme za pochopení.</div>
        </div>';
    } else {
        $f = fopen($file, "r");
        while (($radek = fgets($f)) !== false) {
            list($image, $name, $info, $price) = explode("|", $radek);

            $info = mb_strtolower(trim($info), 'UTF-8');
            $info_exploded = explode(", ", $info);

            if (in_array($hledani, $info_exploded)) {
                echo "<div class='pizza-list-polozka'>";

                    echo "<div class='pizza-list-polozka-image'><img src='$image.webp' alt='PIZZA-IMAGE'>
                    </div>";
                    echo "<div class='pizza-list-polozka-header'>
                    ". $name ."
                    </div>";
                    echo "<hr>";
                    echo "<div class='pizza-list-polozka-undertext'>
                    ". $info ."
                    </div>";
                    echo "<div class='pizza-list-polozka-price'>
                    <i class='fa-solid fa-cart-plus'></i> ".$price." Kč
                    </div>";
    
                echo "</div>";

                $takjsmetuneconasli = 1;
            }
        } 

        if($takjsmetuneconasli === 0){
            echo "<div class='sad-pizza-error'>";
                echo "<div class='sad-pizza-error-text'>
                    <h1>OMLOUVÁME SE <i class='fa-solid fa-heart-crack'></i></h1>
                    <hr>
                    <div>Bohužel tuto ingredienci neobsahuje žádná z našich pizz.</div>
                </div>";
                echo "<div class='sad-pizza-error-image'></div>";
            echo "</div>";
        }

        fclose($f);
    }
    ?>


     
        </div>

    </div>
    

<?php 
include "footer.php";
?>
</body>
</html>