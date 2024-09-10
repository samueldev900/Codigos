<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Curso CI4'  ?></title>
</head>
<body>
    <?= $this->include('menu') ?>
    <?= $this->renderSection('content') ?>

<footer>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit dignissimos, odio delectus odit rerum fugiat asperiores tempore qui labore repellendus molestias voluptates, ipsa sapiente enim saepe omnis hic pariatur iure.
</footer>
</body>
</html>