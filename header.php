<?php include './traitement_toutes_pages.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="flex justify-around gap-8 items-center text-gray-100 bg-gray-900 p-8">

        <a href="accueil.php">Accueil</a>
        <a href="about.php">A propos</a>
        <a href="liste_articles.php">Mes articles</a>

        <?php if (!empty($_SESSION['pseudo'])) : ?>
            <a href="deconnexion.php">Déconnexion</a>
            <p class="flex items-center">
                Bonjour, <?= $_SESSION['pseudo'] ?>

                <!-- On vérifie d'abord si l'avatar existe -->
                <?php if (!empty($_SESSION['avatar'])) : ?>
                    <img class="rounded-full w-12 h-12 ml-4" src="avatars/<?= $_SESSION['avatar'] ?>" alt="">
                <?php endif; ?>
            </p>

        <?php else : ?>
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
            
        <?php endif; ?>
    </nav>