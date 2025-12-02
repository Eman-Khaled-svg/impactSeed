<?php
include '../config/data.php';
include '../inc/header.php';

    include '../component/nav.php';
    $seed_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// جلب البذرة
$seed = $conn->prepare("SELECT * FROM seeds WHERE id = $seed_id")->fetch();

// جلب التعليقات
$comments = $conn->prepare("SELECT * FROM comments WHERE seed_id = $seed_id ORDER BY id DESC");
?>
<link rel="stylesheet" href="../css/community.css">
<div class="container">
    <a href="component/plantSeed.php" class="back">رجوع</a>

    <?php if ($seed): ?>
        <h1><?php echo htmlspecialchars($seed['title']); ?></h1>
        <div class="seed">
            <p><?php echo nl2br(htmlspecialchars($seed['description'])); ?></p>
            <small>بواسطة: <?php echo htmlspecialchars($seed['author']); ?> - 
            <?php echo date('d/m/Y', strtotime($seed['created_at'])); ?></small>
        </div>

        <h2>التعليقات (<?php echo $comments->num_rows; ?>)</h2>
        <?php while($c = $comments->fetch()): ?>
            <div class="comment">
                <strong><?php echo htmlspecialchars($c['name']); ?></strong>
                <p><?php echo nl2br(htmlspecialchars($c['comment'])); ?></p>
                <small><?php echo date('h:i A', strtotime($c['created_at'])); ?></small>
            </div>
        <?php endwhile; ?>

        <?php if ($comments->num_rows == 0): ?>
            <p style="text-align:center; color:#aaa;">لا يوجد تعليقات بعد، كن الأول!</p>
        <?php endif; ?>

        <form action="add_comment.php" method="POST">
            <input type="hidden" name="seed_id" value="<?php echo $seed_id; ?>">
            <input type="text" name="name" placeholder="اسمك" required>
            <textarea name="comment" placeholder="اكتب تعليقك..." required rows="4"></textarea>
            <button type="submit">أرسل التعليق</button>
        </form>

    <?php else: ?>
        <h1>البذرة غير موجودة</h1>
        <p style="text-align:center;">
            <a href="component/plantSeed.php" style="color:#a8e6cf; font-size:1.5rem;">ازرع بذرة جديدة</a>
        </p>
    <?php endif; ?>
</div>