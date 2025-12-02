<?php
include '../config/data.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = intval($_POST['comment_id']);

    // حذف التعليق
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->execute([$comment_id]);

    // نرجع نص بسيط لتأكيد الحذف
    echo "deleted";
}
