<?php
session_start();
include '../config/data.php';
include '../inc/header.php';
include '../component/nav.php';

// تحديد المستخدم الحالي (مسجل أو زائر)
$current_user = isset($_SESSION['username']) 
    ? $_SESSION['username'] 
    : 'guest_' . md5($_SERVER['REMOTE_ADDR'] . ($_SERVER['HTTP_USER_AGENT'] ?? ''));

// جلب كل البذور
$stmt = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجتمع البذور | Impact Seed</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0c6e4b9.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --mint: #a8e6cf;
            --light: #dcedc1;
            --dark: #1a3c34;
            --pink: #e91e63;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #1a3c34, #4a7043);
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* الفقاعات */
        .bubbles {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }
        .bubble {
            position: absolute;
            bottom: -100px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(168,230,207,0.8), transparent 70%);
            opacity: 0.6;
            animation: floatUp linear infinite;
        }
        .bubble:nth-child(1) { width: 80px; height: 80px; right: 10%; animation-duration: 18s; }
        .bubble:nth-child(2) { width: 60px; height: 60px; right: 30%; animation-duration: 14s; animation-delay: 2s; }
        .bubble:nth-child(3) { width: 100px; height: 100px; right: 50%; animation-duration: 22s; animation-delay: 1s; }
        .bubble:nth-child(4) { width: 70px; height: 70px; right: 70%; animation-duration: 16s; animation-delay: 4s; }
        .bubble:nth-child(5) { width: 90px; height: 90px; right: 85%; animation-duration: 20s; animation-delay: 6s; }
        @keyframes floatUp {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-150vh) rotate(360deg); opacity: 0; }
        }

        .community-section {
            max-width: 1000px;
            margin: 180px auto 50px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .section-title {
            font-size: 3rem;
            text-align: center;
            background: linear-gradient(45deg, var(--mint), var(--light));
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 3rem;
            text-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .seed-card {
            background: rgba(168,230,207,0.18);
            border: 2px solid rgba(168,230,207,0.4);
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 35px;
            backdrop-filter: blur(15px);
            transition: all 0.4s ease;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        .seed-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 60px rgba(168,230,207,0.4);
        }

        .seed-card h2 {
            font-size: 1.8rem;
            color: var(--light);
            margin-bottom: 15px;
            background: linear-gradient(45deg, #dcedc1, #a8e6cf);
            -webkit-background-clip: text;
            color: transparent;
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 15px 0;
        }
        .meta span {
            background: rgba(168,230,207,0.3);
            padding: 10px 18px;
            border-radius: 25px;
            font-size: 0.95rem;
            backdrop-filter: blur(5px);
        }

        /* زر اللايك الأسطوري */
        .likes {
            margin: 20px 0;
            text-align: center;
        }
        .like-btn {
            background: rgba(168,230,207,0.25);
            border: 3px solid var(--mint);
            color: var(--mint);
            padding: 16px 40px;
            border-radius: 60px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.3rem;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(168,230,207,0.3);
            display: inline-flex;
            align-items: center;
            gap: 12px;
            min-width: 160px;
            justify-content: center;
        }
        .like-btn:hover {
            background: var(--mint);
            color: var(--dark);
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(168,230,207,0.5);
        }
        .like-btn.liked {
            background: linear-gradient(45deg, #e91e63, #c2185b);
            border-color: #e91e63;
            color: white;
            animation: heartBeat 0.8s ease;
        }
        .like-btn.liked .like-text::after { content: " تم الإعجاب"; }
        .like-btn .like-text::after { content: " إعجاب"; }
        .like-btn.liked i { animation: pulse 1.5s infinite; }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }

      .comment-form {
    margin-top: 25px;
    background: rgba(168,230,207,0.1);
    padding: 20px;
    border-radius: 20px;
    border: 1.5px dashed #a8e6cf;
    backdrop-filter: blur(8px);
    transition: all 0.3s ease;
}
.comment-form:hover {
    border-color: #dcedc1;
    box-shadow: 0 10px 30px rgba(168,230,207,0.3);
}

.comment-form input,
.comment-form textarea {
    width: 100%;
    margin: 8px 0;
    padding: 12px;
    border: none;
    border-radius: 12px;
    font-family: 'Cairo', sans-serif;
    font-size: 1rem;
    background: rgba(255,255,255,0.15);
    color: #fff;
    transition: all 0.3s ease;
}
.comment-form input:focus,
.comment-form textarea:focus {
    outline: none;
    background: rgba(255,255,255,0.25);
    box-shadow: 0 0 20px rgba(168,230,207,0.5);
}

.comment-form textarea { 
    resize: none; 
    height: 100px;
}

.comment-form button {
    background: #a8e6cf;
    color: #1a3c34;
    border: none;
    padding: 12px 35px;
    border-radius: 50px;
    cursor: pointer;
    font-weight: bold;
    font-size: 1.1rem;
    transition: all 0.4s ease;
    margin-top: 10px;
    box-shadow: 0 8px 25px rgba(168,230,207,0.4);
}
.comment-form button:hover {
    background: #dcedc1;
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(220,237,193,0.5);
}
/* Footer */
footer {
    padding: 2rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.3);
    margin-top: auto;
}

footer p {
    font-size: 0.9rem;
    color: #e0e0e0;
}
        /* ريسبونسيف */
        @media (max-width: 768px) {
            .community-section { margin-top: 140px; padding: 15px; }
            .section-title { font-size: 2.3rem; }
            .seed-card { padding: 20px; }
            .seed-card h2 { font-size: 1.5rem; }
            .like-btn { width: 100%; padding: 18px; font-size: 1.4rem; }
        }
        @media (max-width: 480px) {
            .section-title { font-size: 2rem; }
            .seed-card h2 { font-size: 1.3rem; }
            .meta span { font-size: 0.85rem; padding: 8px 14px; }
        }
    </style>
</head>
<>

    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <section class="community-section">
        <h1 class="section-title">مجتمع البذور</h1>

        <?php if(count($posts) > 0): ?>
            <?php foreach($posts as $post): 
                // عدد اللايكات
                $stmt = $conn->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ? AND is_like = 1");
                $stmt->execute([$post['id']]);
                $likes_count = $stmt->fetchColumn();

                // هل المستخدم عمل لايك؟
                $stmt = $conn->prepare("SELECT 1 FROM likes WHERE post_id = ? AND author = ?");
                $stmt->execute([$post['id'], $current_user]);
                $user_liked = $stmt->fetch() ? true : false;

                // التعليقات
                $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
                $stmt->execute([$post['id']]);
                $comments = $stmt->fetchAll();
            ?>
                <div class="seed-card">
                    <h2><?= htmlspecialchars($post['title']) ?></h2>
                    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    <div class="meta">
                        <span>بواسطة: <?= htmlspecialchars($post['author']) ?></span>
                        <span><?= date('d/m/Y', strtotime($post['created_at'])) ?></span>
                        <span>الموقع: (<?= $post['x_coord'] ?>, <?= $post['y_coord'] ?>)</span>
                    </div>

                    <div class="likes">
                        <button class="like-btn <?= $user_liked ? 'liked' : '' ?>" data-post-id="<?= $post['id'] ?>">
                            <span class="like-count"><?= $likes_count ?></span>
                            <span class="like-text"></span>
                        </button>
                    </div>

                    <div class="comments-section">
                        <h3>التعليقات (<?= count($comments) ?>)</h3>
                        <?php if(count($comments) > 0): ?>
                            <?php foreach($comments as $c): ?>
                                <div class="comment">
                                    <strong><?= htmlspecialchars($c['author']) ?></strong>
                                    <p><?= nl2br(htmlspecialchars($c['comment'])) ?></p>
                                    <small><?= date('h:i A - d/m/Y', strtotime($c['created_at'])) ?></small>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p style="opacity:0.7;">لا يوجد تعليقات بعد.. كن الأول!</p>
                        <?php endif; ?>
                    </div>

                   <div class="comment-form">
    <form method="POST" action="addComment.php">
        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
        <input type="text" name="name" placeholder="اسمك" required>
        <textarea name="comment" placeholder="اكتب تعليقك هنا..." required></textarea>
        <button type="submit">أرسل التعليق</button>
    </form>
</div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; font-size:1.5rem; opacity:0.8;">لا توجد بذور بعد.. كن الأول لزرع فكرة!</p>
        <?php endif; ?>
    </section>

   

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".like-btn");
            
            buttons.forEach(btn => {
                btn.addEventListener("click", async function() {
                    if (this.disabled) return;
                    this.disabled = true;
                    
                    const postId = this.dataset.postId;
                    const countSpan = this.querySelector(".like-count");
                    const wasLiked = this.classList.contains("liked");
                    
                    try {
                        const res = await fetch("toggleLike.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/x-www-form-urlencoded" },
                            body: "post_id=" + postId
                        });
                        
                        if (!res.ok) throw new Error("Network error");
                        
                        const newCount = await res.text();
                        countSpan.textContent = newCount;
                        this.classList.toggle("liked", !wasLiked);
                        
                    } catch (err) {
                        alert("فشل في تحديث اللايك، جرب تاني  !");
                        console.error(err);
                    } finally {
                        this.disabled = false;
                    }
                });
            });
        });
    </script>
    <script src="../js/nav.js"></script>
    <?php
        include '../inc/footer.php'
    ?>
</body>
</html>