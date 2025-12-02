<?php include '../inc/header.php'; ?>
<?php
include '../component/nav.php'; 
    
?>
<?php include '../config/data.php'; ?>


<?php
// لو جالنا POST من الفورم → نحفظ البذرة
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author = $_POST['author'];
    $title  = $_POST['title'];
    $content  = $_POST['content'];
    $x      = $_POST['x'];
    $y      = $_POST['y'];

    if (!empty($author) && !empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO posts (title, content, author, x_coord, y_coord) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $content, $author, $x, $y]);

        header("Location: community.php"); // بعد الزراعة نروح للمجتمع
        exit();
    }
}
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

body {
    font-family: 'Cairo', sans-serif;
    background: linear-gradient(135deg, #1a3c34, #4a7043);
    color: #fff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    direction: rtl;
    text-align: right;
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

/* Plant Section */
.plant-section {
    max-width: 900px;
    margin: 2em auto;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    transform: translateY(50px);
    margin-top: 47px;
    transition: opacity 0.6s ease, transform 0.6s ease;
    margin-top: 200px;
}

.plant-section.visible {

    transform: translateY(0);
}

.section-title {
    font-size: 2rem;
    color: #a8e6cf;
    margin-bottom: 1rem;
    text-align: center;
}

.section-title i {
    margin-left: 0.5rem;
}

#map {
    display: block;
    margin: 0 auto;
    border: 2px solid #a8e6cf;
    border-radius: 10px;
    cursor: pointer;
}

.hint {
    text-align: center;
    margin-top: 1rem;
    color: #e0e0e0;
    font-size: 1.1rem;
}

#seed-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1.5rem;
}

#seed-form input,
#seed-form textarea {
    padding: 0.8rem;
    border-radius: 10px;
    border: none;
    font-size: 1rem;
    font-family: 'Cairo', sans-serif;

    color: #000;
}

#seed-form textarea {
    resize: vertical;
    min-height: 120px;
}

#seed-form button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.8rem;
    background: #a8e6cf;
    color: #1a3c34;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
}

#seed-form button:hover {
    background: #dcedc1;
    transform: translateY(-3px);
}

/* Community Section */
.community-section {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.community-section.visible {
    opacity: 1;
    transform: translateY(0);
}

.button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.8rem 1.5rem;
    background: #a8e6cf;
    color: #1a3c34;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 25px;
    transition: transform 0.3s ease, background 0.3s ease;
}

.button:hover {
    background: #dcedc1;
    transform: translateY(-3px);
}

.button i {
    font-size: 1.2rem;
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

/* Responsive */
@media (max-width: 768px) {
 .plant-section{
 }
    .plant-section,
    .community-section {
        margin: 1rem;
        padding: 1.5rem;
    margin-top: 165px;

    }

    #map {
        width: 100%;
        height: 300px;
    }

    .section-title {
        font-size: 1.8rem;
    }

    header {
        flex-direction: column;
        gap: 1rem;
    }

    header nav {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .section-title {
        font-size: 1.5rem;
    }
}
</style>
<!-- plant the seed -->
<section class="plant-section">
    <h2 class="section-title">خريطة المجتمع الوهمية</h2>
    <canvas id="map" width="800" height="400"></canvas>
    <p class="hint">انقر على الخريطة لاختيار موقع بذرتك</p>

    <h3 class="section-title">ازرع بذرة جديدة</h3>
    <form id="seed-form" method="POST">
        <input type="text" name="author" placeholder="اسمك" required>
        <input type="text" name="title" placeholder="عنوان البذرة" required>
        <textarea name="content" placeholder="قصتك أو فكرتك..." required></textarea>
        <input type="hidden" name="x" id="x" value="">
        <input type="hidden" name="y" id="y" value="">
        <button type="submit">ازرع البذرة</button>
    </form>
    <div id="msg" style="text-align:center; margin-top:15px; font-weight:bold; color:#dcedc1;"></div>
</section>

<!-- community section-->
<section class="community-section">
    <h3 class="section-title">بذور المجتمع</h3>
    <a href="../component/community.php" class="button">ادخل المجتمع</a>
</section>



<script>
const canvas = document.getElementById('map');
const ctx = canvas.getContext('2d');
const msg = document.getElementById('msg');

// رسم الخريطة
ctx.fillStyle = '#228B22';
ctx.fillRect(0, 0, 800, 400);
ctx.fillStyle = '#00B7EB';
ctx.beginPath();
ctx.arc(600, 300, 80, 0, 2 * Math.PI);
ctx.fill();

canvas.onclick = function(e) {
    const rect = canvas.getBoundingClientRect();
    const x = Math.round(e.clientX - rect.left);
    const y = Math.round(e.clientY - rect.top);

    document.getElementById('x').value = x;
    document.getElementById('y').value = y;

    // نرسم العلامة الذهبية
    ctx.fillStyle = '#228B22';
    ctx.fillRect(0, 0, 800, 400);
    ctx.fillStyle = '#00B7EB';
    ctx.beginPath();
    ctx.arc(600, 300, 80, 0, 2 * Math.PI);
    ctx.fill();

    ctx.fillStyle = '#FFD700';
    ctx.beginPath();
    ctx.arc(x, y, 25, 0, 2 * Math.PI);
    ctx.fill();
    ctx.strokeStyle = '#FFF';
    ctx.lineWidth = 5;
    ctx.stroke();

    msg.innerHTML = `تم اختيار الموقع: (${x}, ${y})`;
};

// أنيميشن الظهور
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {
    threshold: 0.1
});

document.querySelectorAll('.plant-section, .community-section').forEach(sec => {
    observer.observe(sec);
});
</script>
<script src="../js/nav.js"></script>
<?php include '../inc/footer.php'; ?>