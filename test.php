<?php

// test formulaire
$postData = $_POST;
if(empty($postData['titre']) 
    || empty($postData['recipe'])
    || trim(strip_tags($postData['titre'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
)
{
    echo 'tous les champs sont obligatoire';
}
$titre = trim(strip_tags($postData['title']));
$recipe = trim(strip_tags($postData['recipe']));

$query = 'INSERT INTO recipes(titre, recipe, author, is_enabled) values(:titre, :recipe, :author, :is_enabled)';
$creatStatement = $connxion->prepare($query);
$creatStatement->execute([
    'titre' => $postData['titre'],
    'recipe' => $postData['recipe'],
    'author' => $_SESSION['LOGGED_USER']['email'],
    'is_enabled' => 1,
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5><?= $postData['titre'] ?></h5>
    <div><?= $postData['recipe'] ?></div>
    <p>Contribué par <?= $_SESSION['LOGGED_USER']['email'] ?></p>
</body>
</html>
