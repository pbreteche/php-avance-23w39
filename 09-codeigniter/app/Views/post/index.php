<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dernières publications</title>
</head>
<body>
    <h1>Dernières publications</h1>
    <?php foreach ($posts as $post): ?>
    <h2><?= esc($post->title) ?></h2>
    <div>
        <?= esc($post->body) ?>
    </div>
    <?php endforeach; ?>
</body>
</html>