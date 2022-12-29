<?php
$id = $_GET['id'];
if (!isset($id)){
    die('Нужно передать id');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $createdAt = date('d.m.Y');
    $xml = "<post>
    <id>$id</id>
    <title>$title</title>
    <content>$content</content>
    <createdAt>$createdAt</createdAt>
    </post>";
    file_put_contents('data/'.$id.'.xml', $xml);
    header('Location: index.php?id='.$id);
    exit(0);
}
else{
    $post = simplexml_load_file('data/' . $id . '.xml') or die("Failed to load");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить</title>
</head>
<body>
    <form method="post">
        <input placeholder="Заголовок" name="title" value="<?=$post->title?>" type="text">
        <input placeholder="Контент" name="content" value="<?=$post->content?>" type="text">
        <input value="Изменить" type="submit">
    </form>
</body>
</html>