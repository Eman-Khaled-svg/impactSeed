<?php
include '../config/data.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = intval($_POST['post_id']);
    $name    = $_POST['name'];
    $comment = $_POST['comment'];

    if($post_id > 0 && !empty($name) && !empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO comments (post_id, author, comment, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$post_id, $name, $comment]);
    }
}

header("Location: community.php?id=$post_id");
exit();
