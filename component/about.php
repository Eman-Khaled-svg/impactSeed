<?php 
$base_url = "/ImpactSeed/";
include '../inc/header.php'; 
include '../component/nav.php'; 
?>

<link rel="stylesheet" href="<?php echo $base_url; ?>css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>


/* الفقاعات المتحركة */
.bubbles {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 0;
}

.bubbles .bubble {
    position: absolute;
    bottom: -150px;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(168, 230, 207, 0.7), rgba(168, 230, 207, 0.1) 60%);
    opacity: 0.5;
    animation: floatUp linear infinite;
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
    right: 25%;
    animation-duration: 15s;
    animation-delay: 3s;
}

.bubbles .bubble:nth-child(3) {
    width: 100px;
    height: 100px;
    right: 50%;
    animation-duration: 22s;
    animation-delay: 1s;
}

.bubbles .bubble:nth-child(4) {
    width: 70px;
    height: 70px;
    right: 70%;
    animation-duration: 17s;
    animation-delay: 5s;
}

.bubbles .bubble:nth-child(5) {
    width: 90px;
    height: 90px;
    right: 85%;
    animation-duration: 20s;
    animation-delay: 7s;
}

@keyframes floatUp {
    0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0;
    }

    10% {
        opacity: 0.5;
    }

    90% {
        opacity: 0.5;
    }

    100% {
        transform: translateY(-150vh) rotate(360deg);
        opacity: 0;
    }
}

/* الهيرو */
.hero-section {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1;
    padding: 0 20px;
}

.hero-title {
    font-size: 5rem;
    background: linear-gradient(45deg, #a8e6cf, #dcedc1, #fff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
    animation: fadeInUp 1.5s ease-out;
    text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.hero-subtitle {
    font-size: 1.9rem;
    color: #dcedc1;
    max-width: 900px;
    margin: 0 auto 50px;
    animation: fadeInUp 2s ease-out;
    line-height: 1.8;
}

.scroll-btn {
    background: rgba(168, 230, 207, 0.25);
    border: 3px solid #a8e6cf;
    color: #fff;
    padding: 18px 50px;
    border-radius: 60px;
    font-size: 1.3rem;
    font-weight: bold;
    cursor: pointer;
    backdrop-filter: blur(12px);
    transition: all 0.5s ease;
    animation: fadeInUp 2.5s ease-out;
    box-shadow: 0 15px 35px rgba(168, 230, 207, 0.3);
}

.scroll-btn:hover {
    background: #a8e6cf;
    color: #1a3c34;
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 20px 50px rgba(168, 230, 207, 0.5);
}

.scroll-btn i {
    margin-right: 10px;
    animation: bounce 2s infinite;
}

@keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateY(0);
    }

    40% {
        transform: translateY(-15px);
    }

    60% {
        transform: translateY(-8px);
    }
}

/* القسم عن المطورة */
.about-developer,
.about-project {
    padding: 120px 20px;
    opacity: 0;
    transform: translateY(60px);
    transition: all 1s ease;
}

.about-developer.visible,
.about-project.visible {
    opacity: 1;
    transform: translateY(0);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 80px;
    flex-wrap: wrap;
    justify-content: center;
}

.developer-img {
    flex: 1;
    min-width: 280px;
    text-align: center;
}

.developer-img img {
    width: 340px;
    height: 340px;
    border-radius: 50%;
    object-fit: cover;
    border: 10px solid #a8e6cf;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
    transition: all 0.6s ease;
}

.developer-img img:hover {
    transform: scale(1.08) rotate(5deg);
    border-color: #dcedc1;
}

.developer-text {
    flex: 1.5;
    min-width: 300px;
}

.developer-text h3 {
    font-size: 3rem;
    color: #dcedc1;
    margin-bottom: 30px;
    position: relative;
}

.developer-text h3::after {
    content: '';
    position: absolute;
    bottom: -15px;
    right: 0;
    width: 100px;
    height: 5px;
    background: linear-gradient(90deg, #a8e6cf, transparent);
    border-radius: 50px;
}

.developer-text p {
    font-size: 1.4rem;
    line-height: 2.2;
    color: #e8f5e8;
}

/* قسم عن المشروع */
.section-title {
    font-size: 3.5rem;
    text-align: center;
    background: linear-gradient(45deg, #a8e6cf, #dcedc1);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 60px;
    text-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.section-description {
    font-size: 1.5rem;
    text-align: center;
    max-width: 1000px;
    margin: 0 auto 70px;
    line-height: 2;
    color: #dcedc1;
}

.features,
.vision,
.join-us {
    background: rgba(168, 230, 207, 0.12);
    padding: 50px;
    border-radius: 30px;
    margin: 50px auto;
    max-width: 1000px;
    border: 2px dashed rgba(168, 230, 207, 0.4);
    backdrop-filter: blur(10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
}

.features:hover,
.vision:hover,
.join-us:hover {
    transform: translateY(-10px);
    border-color: #a8e6cf;
}

.features h4,
.vision h4,
.join-us h4 {
    font-size: 2.3rem;
    color: #dcedc1;
    margin-bottom: 30px;
    text-align: center;
}

.features ul {
    list-style: none;
    font-size: 1.4rem;
    line-height: 2.8;
}

.features li {
    padding-right: 50px;
    position: relative;
    transition: all 0.3s ease;
}

.features li:hover {
    transform: translateX(-10px);
    color: #dcedc1;
}

.features li i {
    position: absolute;
    right: 0;
    top: 10px;
    color: #a8e6cf;
    font-size: 1.8rem;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== FOOTER ===== */
footer {
  padding: 1.5rem;
  text-align: center;
  background: rgba(0,0,0,0.3);
  margin-top: 2rem;
}
footer p {
  font-size: 0.9rem;
  color: #e0e0e0;
}
/* ريسبونسيف كامل */
@media (max-width: 1024px) {
    .hero-title {
        font-size: 4rem;
    }

    .hero-subtitle {
        font-size: 1.6rem;
    }

    .container {
        gap: 50px;
    }

    .developer-img img {
        width: 300px;
        height: 300px;
    }
}


@media (max-width: 768px) {
    header {
        padding: 1rem;
        flex-wrap: wrap;
    }

    .hero-title {
        font-size: 3.2rem;
    }

    .hero-subtitle {
        font-size: 1.4rem;
    }

    .scroll-btn {
        padding: 15px 35px;
        font-size: 1.1rem;
    }

    .container {
        flex-direction: column;
        text-align: center;
    }

    .developer-img img {
        width: 260px;
        height: 260px;
    }

    .developer-text h3 {
        font-size: 2.5rem;
    }

    .section-title {
        font-size: 2.8rem;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.2rem;
    }

    .developer-img img {
        width: 220px;
        height: 220px;
    }

    .features,
    .vision,
    .join-us {
        padding: 30px;
    }

    .features li {
        font-size: 1.2rem;
        padding-right: 40px;
    }
}
</style>

<!-- الفقاعات -->
<div class="bubbles">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
</div>

<!-- أيقونة المينو -->
<div class="menu-toggle">
    <i class="fas fa-bars"></i>
</div>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <h2 class="hero-title">عن Impact Seed</h2>
        <p class="hero-subtitle">منصة تفاعلية لزراعة بذور التغيير نحو عالم أكثر خضرة!</p>
        <button class="scroll-btn">
            <span>اكتشف المزيد</span>
            <i class="fas fa-chevron-down"></i>
        </button>
    </section>

    <!-- About Developer -->
    <section class="about-developer">
        <div class="container">
            <div class="developer-img">
                <img src="<?php echo $base_url; ?>upload/IMG-20251016-WA0001.jpg" alt="إيمان خالد - مطورة Impact Seed"
                    loading="lazy">
            </div>
            <div class="developer-text">
                <h3>من أنا؟</h3>
                <p>
                    أنا <strong>إيمان خالد</strong>، مطورة ويب من القاهرة، شغوفة بالبرمجة والبيئة والنفسية الإيجابية.
                    أؤمن إن كل فكرة صغيرة ممكن تكون بذرة تغيّر العالم.
                    من هنا جت فكرة <strong>Impact Seed</strong>: منصة تجمع الناس من كل حتة في العالم عشان يشاركوا قصصهم،
                    نصايحهم، وأحلامهم الخضراء.
                </p>
            </div>
        </div>
    </section>

    <!-- About Project -->
    <section class="about-project">
        <div class="container">
            <h3 class="section-title">عن مشروع Impact Seed</h3>
            <p class="section-description">
                Impact Seed هي منصة تفاعلية عربية 100% تهدف لنشر الوعي البيئي والإيجابية من خلال مشاركة القصص الحقيقية،
                العبر، والنصائح اليومية.
            </p>
            <div class="features">
                <h4>المميزات الرئيسية</h4>
                <ul>
                    <li>خريطة عالمية تفاعلية لتتبع البذور في كل دولة</li>
                    <li>مشاركة القصص والعبر من كل بقاع الأرض</li>
                    <li>مجتمع داعم وإيجابي للتواصل والتشجيع</li>
                    <li>نصائح يومية للحياة الأفضل</li>
                    <li>تتبع رحلتك الشخصية في زراعة التغيير</li>
                </ul>
            </div>
            <div class="vision">
                <h4>رؤيتنا</h4>
                <p>كوكب أخضر، قلوب متصلة، وأمل ينمو مع كل بذرة تُزرع.</p>
            </div>
            <div class="join-us">
                <h4>انضم إلينا الآن</h4>
                <p>كل واحد فينا بذرة... وكل بذرة ممكن تكون غابة. ابدأي دلوقتي، وخلّي بصمتك الخضراء في العالم!</p>
            </div>
        </div>
    </section>
</main>


<script src="../js/nav.js"></script>

<script>


// Smooth scroll
document.querySelector('.scroll-btn').addEventListener('click', () => {
    document.querySelector('.about-developer').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });
});

// الأنيميشن عند التمرير
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {
    threshold: 0.15
});

document.querySelectorAll('.about-developer, .about-project, .features, .vision, .join-us').forEach(el => {
    observer.observe(el);
});

// إضافة تأثير عند التمرير للهيدر
window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        document.querySelector('header').style.background = 'rgba(0,0,0,0.8)';
    } else {
        document.querySelector('header').style.background = 'rgba(0,0,0,0.6)';
    }
});
</script>
<?php include '../inc/footer.php'; ?>