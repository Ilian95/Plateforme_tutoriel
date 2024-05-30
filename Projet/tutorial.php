<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du Tutoriel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Détails du Tutoriel</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <?php
            $id = $_GET['id'];
            $file = fopen('data/tutorials.csv', 'r');
            while (($line = fgetcsv($file)) !== FALSE) {
                if ($line[0] == $id) {
                    //line 1 : TITRE DU TUTO et ligne 3 : CONTENU
                    echo "<h2>{$line[1]}</h2>";
                    echo "<p>{$line[3]}</p>";
                    break;
                }
            }
            fclose($file);
            ?>
        </section>
    </main>
</body>

</html>