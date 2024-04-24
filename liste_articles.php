<?php 
include './header.php';
include './test.php';
// On crée une page mes articles dans laquelle on va mettre tout les articles de la bdd

// On se connecte d'abord à la bdd

$bdd = new PDO('mysql:host=localhost;dbname=blog','root','');

// On récupère tout les articles sous forme de tableau
$articles = $resultat->fetchAll(PDO::FETCH_ASSOC);


// Pour chaque article j'affiche l'article
// On utilise une boucle


echo '<div class="flex gap-8 m-8 items-stretch justify-center">';


foreach ($articles as $a) { ?>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="<?= $a['image'] ?>" alt="">
        <div class="px-6 py-4">
            <h2 class="font-bold text-xl mb-2"><?= $a['titre'] ?></h2>
            <p class="text-gray-700 text-base">
                <?= substr($a['contenu'], 0, 150) ?>...
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= date_create($a['date'])->format('\L\e d/m/Y Ã  H\hi') ?></span>
        </div>
    </div>
<?php }

echo '</div>';
include './footer.php';


// Reprendre avec contenu pas à 300 mots, arranger la date

?>

