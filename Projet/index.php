<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Plateforme de Tutoriels</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Bienvenue sur la Plateforme de Tutoriels</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Tutoriels Récents</h2>
            <div class="tutorial-list">
                <?php
                // Récupérer les données du fichier tutorials.csv
                $tutorialsData = array_map('str_getcsv', file('data/tutorials.csv'));

                // Inverser l'ordre pour obtenir les entrées les plus récentes en premier
                $tutorialsData = array_reverse($tutorialsData);

                // Afficher les 9 derniers tutoriels
                for ($i = 0; $i < min(9, count($tutorialsData)); $i++) {
                    echo '<div class="tutorial">';
                    echo '<h3><a href="tutorial.php?id=' . $tutorialsData[$i][0] . '">' . $tutorialsData[$i][1] . '</a></h3>';
                    echo '<p>' . $tutorialsData[$i][2] . '</p>';
                    // Ajoutez ici d'autres détails du tutoriel si nécessaire
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>