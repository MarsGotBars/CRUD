<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CROW | Collectie</title>
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
                <li><a class="magic-hover magic-hover__square" href="#"> Jouw collectie</a></li>
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
            <h1>Jouw Collectie</h1>
            <div id="divider"></div>
            <section>
            <?php
                $servername = "localhost";
                $username = "joemama";
                $password = "joemama";
                $dbname = "86908_po";

                // start connectie
                $conn = new mysqli($servername, $username, $password, $dbname);
                // check connectie
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // pak table
                $sql = "SELECT * FROM `dier`";
                $result = $conn->query($sql);
                // delete na confirm
                if(isset($_GET['delete_id'])){
                    // delete gebaseerd op ID
                    $del = "DELETE FROM `dier` WHERE id = ".$_GET['delete_id'];
                    // refresh pagina
                    if(mysqli_query($conn, $del)){
                        header("Location: https://86907.ict-lab.nl/PHP/Quisquiliarum/Overzicht.php");
                        // eindig connectie
                        die();
                    }
                    else {
                        echo "Error: " . $del . " " . mysqli_error($conn);
                    };
                    
                };
                // na submit
                if(isset($_POST['submit']))
                {
                    // zet info om in variabelen
                    $naam = $_POST['name'];
                    // zet string om naar kleine letters
                    $naam = strtolower($naam);
                    // zet eerste letter van elk woord om in een hoofdletter
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
                    // zet info in de table
                    $pls = "INSERT INTO `dier`(`naam`, `soort`, `geboorteDatum`, `geslacht`, `land`, `regio`) VALUES ('$naam','$soort','$date','$geslacht','$land','$regio')";
                    if(mysqli_query($conn, $pls)){
                        // refresh pagina
                        header("Location: https://86907.ict-lab.nl/PHP/Quisquiliarum/Overzicht.php");
                        // eindig connectie
                        die();
                    }
                    else {
                        echo "Error: " . $pls . " " . mysqli_error($conn);
                    };
                }
                    if($result -> num_rows > 0){
                        echo "<table><tr><th onclick='sortTable(0)'>Image</th><th onclick='sortTable(1)'>Naam</th><th onclick='sortTable(2)'>Dier</th><th onclick='sortTable(3)'>Geboorte datum</th><th onclick='sortTable(4)'>Geslacht</th><th onclick='sortTable(5)'>Land</th><th onclick='sortTable(6)'>Regio</th><th>Delete</th><th>Edit</th></tr>";
                        // loop om de tabel uit te lezen en uit te schrijven
                        while($row = mysqli_fetch_array($result)){
                            // als de regel een foto bevat dan wordt deze getoond
                            if(file_exists(__DIR__ . "/uploads/" . $row['id'] . '.jpg')){
                                $verkeerd = false;
                                echo "<tr><td><a class='overlay' href='foto.php?id=".$row['id']."&verkeerd=".$verkeerd."'><img class='pic' src='uploads/" . $row["id"] . ".jpg' alt='foto'><span class='edit'>edit</span></td>";
                            }
                            // anders wordt er een link opgeschreven
                            else{
                                $verkeerd = false;
                                echo "<tr><td><a href='foto.php?id=".$row['id']."&verkeerd=".$verkeerd."'><img class='magic-hover magic-hover__circle' src='upload.svg'></a></td>";
                            }
                            echo "<td>".$row["naam"]."</td><td>".$row["soort"]."</td><td>".$row["geboorteDatum"]."</td><td>".$row["geslacht"]."</td><td>".$row["land"]."</td><td>".$row["regio"]."</td><td>"."<a href='javascript:delete_id(". $row['id'] .")'><img class='magic-hover magic-hover__circle' src='delete.svg'></a>"."</td><td>"."<a href='edit.php?id=".$row['id']."'><img class='magic-hover magic-hover__circle' src='edit.svg'></a>"."</td></tr>";
                        };
                        // sluit table
                    echo "</table>";
                }
            ?>
            </section>
        </article>
    </main>
    <!-- extra scripts -->
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
    <!-- script voor confirm -->
    <script type="text/javascript">
        function delete_id(id)
        {
            if(confirm('Sure to remove this?'))
            {
                window.location.href='Overzicht.php?delete_id='+id;
            }
        }
    </script>
    <script src="sort.js"></script>
</body>

</html> 