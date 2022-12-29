<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ids = [];

    foreach (glob('data/*.xml') as $filename) {
        $ids[] = (int)filter_var($filename, FILTER_SANITIZE_NUMBER_INT);
    }
    sort($ids, SORT_NUMERIC);
    $newId = $ids[count($ids)-1] + 1;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $createdAt = date('d.m.Y');
    $xml = "<post>
    <id>$newId</id>
    <title>$title</title>
    <content>$content</content>
    <createdAt>$createdAt</createdAt>
    </post>";
    file_put_contents('data/'.$newId.'.xml', $xml);
    header('Location: index.php?id='.$newId);
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать</title>
</head>
<body>
    <form method="post">
        <input placeholder="Заголовок" name="title" type="text">
        <input placeholder="Контент" name="content" type="text">
        <input value="Создать" type="submit">
    </form>
</body>
</html>