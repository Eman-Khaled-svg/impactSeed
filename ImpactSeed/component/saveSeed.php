<?php
include './config/data.php';

// لو مفيش بوست = متعملش حاجة
if ($_POST) {
    $title = $_POST['title'];
    $story = $_POST['story'];
    $author = $_POST['author'];
    $x = $_POST['x'];
    $y = $_POST['y'];


    $sql =$conn->prepare( "INSERT INTO seeds (title, description, author, x_coord, y_coord) 
            VALUES ('$title', '$story', '$author', '$x', '$y')");

    if ($sql === TRUE) {
        $id = $conn->insert_id;
        header("Location: community.php?id=$id");
        exit();
    } else {
        echo "فشل الحفظ!";
    }
}
?>