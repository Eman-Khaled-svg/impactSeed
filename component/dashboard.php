<?php
include '../config/data.php';

include '../inc/header.php';
include '../component/nav.php';

$username = 'Emy';

// comments
$stmt = $conn->prepare("SELECT * FROM comments WHERE author = ? ORDER BY created_at DESC");
$stmt->execute([$username]); 
$comments = $stmt->fetchAll();

// likes
$stmt2 = $conn->prepare("SELECT post_id FROM likes WHERE author = ? AND is_like = 1");
$stmt2->execute([$username]);
$liked_posts = $stmt2->fetchAll(PDO::FETCH_COLUMN);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Cairo', sans-serif;
    background: linear-gradient(135deg, #0d3229, #396d46);
    color: #fff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    direction: rtl;
    text-align: right;
}

/* Header */
header {
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(12px);
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
}

header h1 {
    font-size: 1.8rem;
    font-weight: 700;
}

header h1 i {
    margin-left: 0.5rem;
    color: #a8e6cf;
}

header nav {
    display: flex;
    gap: 1.5rem;
}

header nav a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

header nav a:hover,
header nav a.active {
    color: #a8e6cf;
}

/* Bubbles Animation */
.bubbles {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 0;
}

.bubbles .bubble {
    position: absolute;
    bottom: -100px;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.1) 50%);
    opacity: 0.5;
    will-change: transform;
    animation: floatUp 15s infinite linear;
}

.bubbles .bubble:nth-child(1) {
    width: 80px;
    height: 80px;
    right: 10%;
    animation-duration: 18s;
}

.bubbles .bubble:nth-child(2) {
    width: 60px;
    height: 60px;
    right: 30%;
    animation-duration: 12s;
    animation-delay: 2s;
}

.bubbles .bubble:nth-child(3) {
    width: 100px;
    height: 100px;
    right: 50%;
    animation-duration: 20s;
    animation-delay: 1s;
}

.bubbles .bubble:nth-child(4) {
    width: 50px;
    height: 50px;
    right: 70%;
    animation-duration: 14s;
    animation-delay: 3s;
}

.bubbles .bubble:nth-child(5) {
    width: 70px;
    height: 70px;
    right: 90%;
    animation-duration: 16s;
    animation-delay: 4s;
}

@keyframes floatUp {
    0% {
        transform: translateY(0) translateX(0);
    }

    50% {
        transform: translateY(-70vh) translateX(-20px);
    }

    100% {
        transform: translateY(-140vh) translateX(20px);
    }
}

.container {
    max-width: 1100px;
    margin: 50px 100px;
    padding: 40px 50px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 25px;
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
}

ul {
    list-style: none;
    padding: 0;
}

li {
    background: rgba(255, 255, 255, 0.12);
    padding: 30px;
    margin-bottom: 25px;
    border-radius: 20px;
    border-right: 6px solid #4CAF50;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
}

li:hover {
    transform: translateY(-4px);
    background: rgba(255, 255, 255, 0.18);
}

.comment-content {
    flex: 1;
    padding-right: 10px;
}

.comment-content strong {
    font-size: 1.1rem;
    display: block;
    color: #fff;
    margin-bottom: 10px;
}

.comment-content small {
    display: block;
    color: #cce0c9;
    margin-top: 8px;
    font-size: 0.9rem;
}

.actions {
    display: flex;
    align-items: center;
    gap: 18px;
}

.like {
    font-size: 28px;
    color: #ccc;
    transition: color 0.3s ease, transform 0.2s;
    cursor: pointer;
}

.like:hover {
    transform: scale(1.2);
}

.like.liked {
    color: #e74c3c;
    transform: scale(1.2);
}

.btn {
    text-decoration: none;
    padding: 10px 18px;
    background-color: #e74c3c;
    border-radius: 10px;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
    font-weight: 600;
    cursor: pointer;
}

.btn:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}
   /* Footer */
    footer {
    padding: 2rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.3);
    }

    footer p {
    font-size: 0.9rem;
    color: #e0e0e0;
    }

    .social-links {
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    }

    .social-links a {
    color: #a8e6cf;
    font-size: 1.5rem;
    transition: color 0.3s ease;
    }

    .social-links a:hover {
    color: #dcedc1;
    }
/* modal */
.modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
}

.modal-content {
    background-color: #1a3c34;
    margin: 15% auto;
    padding: 30px;
    border-radius: 20px;
    width: 400px;
    text-align: center;
    color: #fff;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #fff;
}

.modal-buttons button {
    margin: 10px;
    padding: 10px 25px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    font-size: 1rem;
}

#cancelBtn {
    background-color: #ccc;
    color: #000;
}

#cancelBtn:hover {
    background-color: #aaa;
}

#confirmBtn {
    background-color: #e74c3c;
    color: #fff;
}

#confirmBtn:hover {
    background-color: #c0392b;
}
</style>

<h1 style="margin-top:60px; font-size: 80px; text-align:center;">Your Dashboard</h1>

<div class="container">
    <h1>مرحباً، <?= htmlspecialchars($username); ?></h1>
    <h2>تعليقاتك</h2>

    <?php if(count($comments) > 0): ?>
    <ul>
        <?php foreach($comments as $comment): ?>
        <li id="comment-<?= $comment['id']; ?>">
            <div class="comment-content">
                <strong>على المنشور #<?= $comment['post_id']; ?>:</strong>
                <?= htmlspecialchars($comment['comment']); ?>
                <small>تاريخ الإضافة: <?= $comment['created_at']; ?></small>
            </div>

            <div class="actions">
                <!-- Like -->
                <i class="fa-solid fa-heart like <?= in_array($comment['post_id'], $liked_posts) ? 'liked' : ''; ?>"
                    data-post-id="<?= $comment['post_id']; ?>"></i>

                <!-- Delete -->
                <button class="btn delete-comment" data-comment-id="<?= $comment['id']; ?>">
                    <i class="fa-solid fa-trash"></i> حذف
                </button>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>لا توجد تعليقات حتى الآن.</p>
    <?php endif; ?>
</div>

<!-- مودال الحذف -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>هل أنت متأكد من حذف هذا التعليق؟</p>
        <div class="modal-buttons">
            <button id="cancelBtn">إلغاء</button>
            <button id="confirmBtn">حذف</button>
        </div>
    </div>
</div>

<script>
// مودال الحذف
let modal = document.getElementById("deleteModal");
let closeBtn = modal.querySelector(".close");
let cancelBtn = document.getElementById("cancelBtn");
let confirmBtn = document.getElementById("confirmBtn");
let comment_id = null;

document.querySelectorAll(".delete-comment").forEach(btn => {
    btn.addEventListener("click", () => {
        comment_id = btn.dataset.commentId;
        modal.style.display = "block";
    });
});

closeBtn.onclick = cancelBtn.onclick = () => {
    modal.style.display = "none";
    comment_id = null;
};

confirmBtn.onclick = () => {
    if (comment_id) {
        fetch(`../component/deleteComment.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `comment_id=${comment_id}`
        })
        .then(res => res.text())
        .then(data => {
            console.log("Server Response:", data);
            if (data.trim() === "deleted") {
                document.getElementById(`comment-${comment_id}`).remove();
            } else {
                alert("حدث خطأ أثناء الحذف: " + data);
            }
            modal.style.display = "none";
            comment_id = null;
        })
        .catch(err => console.error("Error:", err));
    }
};

window.onclick = (event) => {
    if (event.target == modal) {
        modal.style.display = "none";
        comment_id = null;
    }
};


// Like toggle بدون إعادة تحميل الصفحة
document.querySelectorAll(".like").forEach(heart => {
    heart.addEventListener("click", function() {
        const postId = this.dataset.postId;
        fetch(`../component/toggleLike.php`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `post_id=${postId}&author=<?= $username ?>`
            })
            .then(res => res.text())
            .then(data => {
                if (this.classList.contains('liked')) {
                    this.classList.remove('liked');
                } else {
                    this.classList.add('liked');
                }
            })
            .catch(err => console.error(err));
    });
});
</script>

<?php include '../inc/footer.php'; ?>