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
    <title>CROW | Upload Foto</title>
    <link rel="icon" href="crow.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://res.cloudinary.com/veseylab/raw/upload/v1597754760/magicmouse/magic-mouse-1.0.css" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a class="magic-hover magic-hover__square" href="Overzicht.php"> Jouw collectie</a></li>
            </ul>
            <figure><a class="magic-hover magic-hover__circle" href="index.html"><img src="crow2.png" alt="logo"></a></figure>
            <ul>
                <li><a class="magic-hover magic-hover__square" href="add.php">Voeg toe</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <h1>Jouw Collectie</h1>
            <div id="divider"></div>
            <section>
                <?php
                // verkrijg ID uit url
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $verkeerd = $_GET['verkeerd'];
                    // als het geen JPG/JPEG/PJPEG is display dit
                    if ($verkeerd == '1') {
                        echo "<span>Upload alleen JPG/JPEG/PJPEG bestanden!</span>";
                    } 
                    // else {
                    // }
                }
                ?>
                <!-- form om nieuwe foto te uploaden -->
                <form action="foto_verwerk.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $verkeerd; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <p>
                        <label for="foto">Foto:</label>
                        <input type="file" name="foto" id="foto" required="required">
                    </p>
                    <div id='divider' style='margin-top: 25px'></div>
                    <p>
                        <input id="button" class="magic-hover magic-hover__square" type="submit" name="submit" id="submit" value="uploaden">
                        <button id="button" class="magic-hover magic-hover__square" onclick="history.back();return false;">Annuleren</button>
                    </p>
                </form>
            </section>
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
    <script src="sort.js"></script>

</body>

</html>