<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<?php
    $book = 'Dark Matter';
    $read = true;
?>
    <h1>
        <?php if ($read) { ?>
            You have read <?= $book ?>.
        <?php } else { ?>
            You have not read <?= $book ?>."
        <?php } ?>
    </h1>

</body>
</html>