<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Tutoriels</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Liste des Tutoriels</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Barre de Recherche</h2>
            <form action="search.php" method="get">
                <fieldset>
                    <legend>Recherche</legend>
                    <label for="search">Rechercher un tutoriel:</label>
                    <input type="text" id="search" name="query" placeholder="Entrez votre recherche ici" required>
                    <button type="submit">Rechercher</button>
                </fieldset>
            </form>
        </section>
        <section>
            <div class="tutorial-list">
                <?php
                $file = fopen('data/tutorials.csv', 'r');
                while (($line = fgetcsv($file)) !== FALSE) {
                    echo "<div class='tutorial'>";
                    echo "<h3><a href='tutorial.php?id={$line[0]}'>{$line[1]}</a></h3>";
                    echo "<p>{$line[2]}</p>";
                    echo "</div>";
                }
                fclose($file);
                ?>
            </div>
        </section>
    </main>
</body>

</html>