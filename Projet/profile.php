<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Profil Utilisateur</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="tutorials.php">Tutoriels</a>
            <a href="submit.php">Soumettre un tutoriel</a>
            <a href="profile.php">Profil</a>
        </nav>
    </header>
    <main>
        <section>
            <form action="profile.php" method="post">
                <fieldset>
                    <legend>Créer un compte</legend>
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" required><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" required><br>
                    <button type="submit">S'inscrire</button>
                </fieldset>
            </form>
            <?php
            // Vérifier si l'utilisateur est déjà connecté
            if (isset($_SESSION['user_id'])) {
                header('Location: profile.php');
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // Enregistrer les informations de l'utilisateur dans le fichier CSV des utilisateurs
                $userFile = fopen('data/users.csv', 'a');
                fputcsv($userFile, [$username, $email, $password]);
                fclose($userFile);

                echo "<p>Utilisateur enregistré avec succès!</p>";
                // Redirection vers la page de profil après l'inscription
                header('Location: submit.php');
                exit;
            }
            // Fonction pour récupérer les informations de l'utilisateur depuis le fichier CSV des utilisateurs
            function getUserInfo($userId)
            {
                $users = array_map('str_getcsv', file('data/users.csv'));
                foreach ($users as $user) {
                    if ($user[0] === $userId) {
                        return $user;
                    }
                }
                return false;
            }

            // Récupérer les informations de l'utilisateur connecté s'il y en a
            $userInfo = isset($_SESSION['user_id']) ? getUserInfo($_SESSION['user_id']) : null;
            ?>
        </section>
    </main>
</body>

</html>