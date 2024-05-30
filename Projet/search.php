<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats de la Recherche</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Résultats de la Recherche</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Résultats de la Recherche</h2>
            <div class="tutorial-list">
                <?php
                // Vérifier si le paramètre query est défini dans l'URL
                if (isset($_GET['query'])) {
                    // Récupérer le terme de recherche
                    $searchTerm = $_GET['query'];

                    // Récupérer les données du fichier tutorials.csv
                    $tutorialsData = array_map('str_getcsv', file('data/tutorials.csv'));

                    // Afficher les tutoriels qui correspondent au terme de recherche
                    foreach ($tutorialsData as $tutorial) {
                        if (stripos($tutorial[1], $searchTerm) !== false || stripos($tutorial[2], $searchTerm) !== false) {
                            echo '<div class="tutorial">';
                            echo '<h3><a href="tutorial.php?id=' . $tutorial[0] . '">' . $tutorial[1] . '</a></h3>';
                            echo '<p>' . $tutorial[2] . '</p>';
                            // Ajoutez ici d'autres détails du tutoriel si nécessaire
                            echo '</div>';
                        }
                    }
                } else {
                    echo '<p>Aucun terme de recherche n\'a été spécifié.</p>';
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>