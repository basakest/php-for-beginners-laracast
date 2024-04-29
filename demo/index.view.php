<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
</head>
<body>
    <!--调整 inspection 关于 Undefined variable 的设置后, $filteredBooks 的定义会从其他文件读取, 但读取到的定义不保证是正确的, 注释调 index.php 中关于该变量的定义, 仍然能从 inspections.php 中读取到相关的定义-->
    <?php foreach ($filteredBooks as $book) : ?>
        <li>
            <?= $book['title'] . ' by ' . $book['author']; ?>
        </li>
    <?php endforeach; ?>
</body>
</html>