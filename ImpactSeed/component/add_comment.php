<?php
include 'db.php';

if ($_POST) {
    $seed_id = intval($_POST['seed_id']);
    $name =($_POST['name']);
    $comment = ($_POST['comment']);

    $sql =$conn->prepare( "INSERT INTO comments (seed_id, name, comment) VALUES ($seed_id, '$name', '$comment')");
    
    if ($sql) {
        // رجوع تلقائي للكومينيتي مع نفس الـ id
        header("Location: community.php?id=$seed_id");
        exit();
    } else {
        echo "فشل إرسال التعليق!";
    }
}
?>