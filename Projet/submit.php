<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Soumettre un Tutoriel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Soumettre un Tutoriel</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <form action="submit.php" method="post">
                <fieldset>
                    <legend>Soumettre Tutoriel</legend>
                    <label for="title">Titre:</label>
                    <input type="text" id="title" name="title" required><br>
                    <label for="category">Catégorie:</label>
                    <input type="text" id="category" name="category" required><br>
                    <label for="summary">Contenu:</label>
                    <textarea id="summary" name="summary" required></textarea><br>
                    <label for="content">Commentaire:</label>
                    <textarea id="content" name="content" required></textarea><br>
                    <button type="submit">Soumettre</button>
                </fieldset>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'];
                $category = $_POST['category'];
                $summary = $_POST['summary'];
                $content = $_POST['content'];

                $id = uniqid();
                $file = fopen('data/tutorials.csv', 'a');
                fputcsv($file, [$id, $title, $category, $summary, $content]);
                fclose($file);

                echo "<p>Tutoriel soumis avec succès!</p>";
            }
            ?>
        </section>
    </main>
</body>

</html>