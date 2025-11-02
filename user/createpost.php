<?php
session_start();
require '../config/config.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $img = $_FILES['image'];
    if (empty($title) || empty($content) || empty($img)) {
        echo "<script>alert('Please enter title or content');</script>";
    }
    else {
        $create = $pdo->prepare("INSERT INTO post (Title, Content, Image, Author_ID, Created_At) VALUES (:title, :content, :img, :author_id, NOW())");
        $create->bindValue(':author_id', $_SESSION['user_id']);
        $create->bindValue(':title', $title);
        $create->bindValue(':content', $content);
        $create->bindValue(':img', $img);
        $create->execute();
        header('Location: /user/myposts.php');
        exit;
    }
}
?>