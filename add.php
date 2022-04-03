<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CROW | Toevoegen</title>
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
                <li><a class="magic-hover magic-hover__square" href="#">Voeg toe</a></li>
            </ul>
        </nav>
    </header>
    <!-- main -->
    <main>
        <!-- content -->
        <article>
            <h1>Voeg toe</h1>
            <div id="divider"></div>
            <section>
                <!-- form om dingen toe te voegen -->
                <form action="Overzicht.php" method="post">
                    <p>dier: <input type="text" name="name" required /></p>
                    <p>soort: <input type="text" name="soort" required /></p>
                    <p>geboorte datum <input type="date" name="geboorte" required /></p>
                    <p>geslacht
                        <select type="text" name="geslacht">
                            <option value="m">M</option>
                            <option value="v">V</option>
                            <option value="o">O</option>
                        </select>
                    </p>
                    <p>land: <input type="text" name="land" required /></p>
                    <p>regio: <input type="text" name="regio" required /></p>
                    <div id='divider' style='margin-top: 25px'></div>
                    <input id="button" class='magic-hover magic-hover__square' type="submit" name="submit" value="Submit" required />
                    <input id="button" class='magic-hover magic-hover__square' type="submit" name="clear" value="Clear" required />
            </section>
        </article>
    </main>
    <footer>

    </footer>
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
    </form>
</body>

</html>