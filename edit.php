<?php
include 'config.php';
ini_set("display_errors", 1);
ini_set("error_reporting", E_ERROR | E_WARNING | E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CROW | Wijzigen</title>
    <link rel="icon" href="crow.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://res.cloudinary.com/veseylab/raw/upload/v1597754760/magicmouse/magic-mouse-1.0.css" />
</head>

<body>
    <!-- header -->
    <header>
        <!-- nav -->
        <nav>
            <!-- links -->
            <ul>
                <li><a class="magic-hover magic-hover__square" href="Overzicht.php">Jouw collectie</a></li>
            </ul>
            <figure><a class="magic-hover magic-hover__circle" href="index.html"><img src="crow2.png" alt="logo"></a></figure>
            <ul>
                <li><a class="magic-hover magic-hover__square" href="add.php">Voeg toe</a></li>
            </ul>
        </nav>
    </header>
    <!-- main -->
    <main>
        <!-- content -->
        <article>
            <h1>Wijzigen</h1>
            <div id="divider"></div>
            <div id="editForm">
                <?php
                $servername = "localhost";
                $username = "joemama";
                $password = "joemama";
                $dbname = "86908_po";

                // start connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // haal id uit url
                if (isset($_GET['id'])) {
                    // neem bepaalde row
                    $row = "SELECT * FROM `dier` WHERE id =" . $_GET['id'];
                    $result = $conn->query($row);
                    $info = mysqli_fetch_array($result);
                    // de form opmaken door middel van de result
                    echo "<form method='post'><p>dier: <input type=text name=name value=" . $info['naam'] . " /></p>
                    <p hidden><input type=hidden type=number name=id value=" . $info['id'] . " /><p>
                    <p>soort: <input type=text name=soort value=" . $info['soort'] . " /></p>
                    <p>geboorte datum <input type=date name=geboorte value=" . $info['geboorteDatum'] . " /></p>
                    <p>geslacht
                    <select type=text name=geslacht>";
                    if ($info['geslacht'] == "m") {
                        echo "<option value=m selected>M</option>";
                    } else {
                        echo "<option value=m>M</option>";
                    };
                    if ($info['geslacht'] == "v") {
                        echo "<option value=v selected>V</option>";
                    } else {
                        echo "<option value=v>V</option>";
                    };
                    if ($info['geslacht'] == "o") {
                        echo "<option value=o selected>M</option>";
                    } else {
                        echo "<option value=o>O</option>";
                    };
                    echo "</select>
                    </p>
                    <p>land: <input type=text name=land value=" . $info['land'] . " /></p>
                    <p>regio: <input type=text name=regio value=" . $info['regio'] . " /></p><div id='divider' style='margin-top: 25px'></div>
                    <input id='button' class='magic-hover magic-hover__square' type='submit' name='submit' value='submit'/></form>";
                }
                // op submit
                if (isset($_POST['submit'])) {
                    // zet info om in variabelen
                    $id = $_POST['id'];
                    $naam = $_POST['name'];
                    // zet woord om in kleine letters
                    $naam = strtolower($naam);
                    // zet eerste letter van elk woord om in een grote letter
                    $naam = ucwords($naam);
                    $soort = $_POST['soort'];
                    $soort = strtolower($soort);
                    $soort = ucwords($soort);
                    $date = $_POST['geboorte'];
                    $geslacht = $_POST['geslacht'];
                    $land = $_POST['land'];
                    $land = strtolower($land);
                    $land = ucwords($land);
                    $regio = $_POST['regio'];
                    $regio = strtolower($regio);
                    $regio = ucwords($regio);
                    // update de bepaalde tabel
                    $upd = "UPDATE `dier` SET `naam`= '$naam', `soort`= '$soort', `geboorteDatum`= '$date',
                    `geslacht`= '$geslacht', `land`= '$land', `regio`= '$regio' WHERE id =" . $id;
                    if ($conn->query($upd)) {
                        // stuur door naar collectie
                        header("Location: https://86907.ict-lab.nl/PHP/Quisquiliarum/Overzicht.php");
                        // eindig collectie
                        die();
                    }
                }
                ?>
            </div>
        </article>
    </main>
    <script type="text/javascript" src="https://res.cloudinary.com/veseylab/raw/upload/v1597754761/magicmouse/magic_mouse-1.0.js"></script>
    <script type="text/javascript">
        options = {
            "cursorOuter": "none",
            "hoverEffect": "circle-move",
            "hoverItemMove": false,
            "defaultCursor": false,
            "outerWidth": 30,
            "outerHeight": 30
        };
        magicMouse(options);
    </script>
</body>
</html>