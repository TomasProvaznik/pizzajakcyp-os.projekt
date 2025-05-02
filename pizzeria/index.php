<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9b018fc7a6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="favicon.ico">
    <title>PIZZA JAK CYP - Menu</title>
</head>

<body>
<div class="intro" id="intro">
        <img src="background-theme.jpg" alt="Intro Image" class="intro-image">
        <img src="pizzeria-logo.png" alt="Pizzeria Logo" class="intro-button" onclick="hideIntro()">
       
    </div>
    <div class="content">
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
            
            $file = 'nabidka.txt';
            if (!file_exists($file)) {
                echo '<div class="pizza-list-error">
                    <h1>OMLOUVÁME SE <i class="fa-solid fa-heart-crack"></i></h1>
                    <hr>
                    <div>Bohužel Vám musíme sdělit, že naše nabídka není nyní dostupná. Co nevidět to opravíme! Děkujeme za pochopení.</div>
                </div>';
            } else {
                
                $f = fopen($file, "r");
            

            while(($radek = fgets($f))!== false){
                list($image, $name, $info, $price) = explode("|", $radek);

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
                echo "
                <button class='pizza-list-polozka-price'>
                <i class='fa-solid fa-cart-plus'></i> ".$price." Kč
                </button>";

            echo "</div>";
            }
        

            fclose($f);
        }
        ?>  

     
        </div>

        <?php 
        include "footer.php";
        ?>
    </div>
  
</body>
</html>