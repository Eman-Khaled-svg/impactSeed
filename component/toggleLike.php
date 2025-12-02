<?php
session_start();
include '../config/data.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['post_id'])) {
    echo "0"; exit;
}

$post_id = intval($_POST['post_id']);
$author = isset($_SESSION['username']) 
    ? $_SESSION['username'] 
    : 'guest_' . md5($_SERVER['REMOTE_ADDR'] . ($_SERVER['HTTP_USER_AGENT'] ?? ''));

try {
    $check = $conn->prepare("SELECT id FROM likes WHERE post_id = ? AND author = ?");
    $check->execute([$post_id, $author]);
    $liked = $check->fetch();

    if ($liked) {
        $conn->prepare("DELETE FROM likes WHERE post_id = ? AND author = ?")->execute([$post_id, $author]);
    } else {
        $conn->prepare("INSERT INTO likes (post_id, author, is_like) VALUES (?, ?, 1)")->execute([$post_id, $author]);
    }

    $count = $conn->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ? AND is_like = 1");
    $count->execute([$post_id]);
    echo $count->fetchColumn();

} catch (Exception $e) {
    error_log("Like Error: " . $e->getMessage());
    echo "0";
}
?>