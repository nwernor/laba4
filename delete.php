<?php

$id = $_GET['id'];
if (!isset($id)){
    die('Нужно передать id');
}

unlink('data/'.$id.'.xml');
header('Location: list.php');
    exit(0);