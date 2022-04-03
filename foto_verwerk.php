<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // op submit
            if(isset($_POST['submit'])){
                $verkeerd = '0';
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
                    // is het bestand een JPG/JPEG/PJPEG?
                    if($_FILES['foto']['type'] == "image/jpg" ||
                       $_FILES['foto']['type'] == "image/jpeg" ||
                       $_FILES['foto']['type'] == "image/pjpeg"){
                        // verander bestand naam
                        $bestand = $_POST['id'] . '.jpg';
                        // selecteer uploads map
                        $map = __DIR__ . "/uploads/";
                        // pad naar bestand
                        $file_pointer = $map . $bestand;
                        // unlink momenteel bestand (voor het geval deze bestaat)
                        unlink($file_pointer);
                        // upload het nieuwe bestand
                        move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);
                        // doorversturen naar de collectie
                        header("Location:Overzicht.php");
                    }
                // als het bestand geen JPG/JPEG/PJPEG is dan
                else{
                    $verkeerd = '1';
                    header("Location:foto.php?id=". $_POST['id'] . "&verkeerd=".$verkeerd);
                }
            }
            // voor het geval er iets mis gaat
            else{
                echo "iets ging fout :^(";
            }
        }
    ?>
</body>
</html>