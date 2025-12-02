<?php
include '../component/nav.php';
include '../inc/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* {
    box-sizing: border-box;
}

/* الفقاعات المتحركة */
.bubbles {
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
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

/* ===== Main Container ===== */
main {
    min-height: calc(105vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* ===== Hero Section ===== */
.hero-section {
    max-width: 900px;
    width: 100%;
    margin: 0 auto;
    padding: 60px 80px;
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    opacity: 0;
    transform: translateY(30px);
    transition: transform 0.6s ease, opacity 0.6s ease;
    margin-top: 200px;
    margin-bottom: 42px;
}

.hero-section.visible {
    opacity: 1;
    transform: translateY(0);
}

.hero-title {
    font-size: clamp(1.8rem, 5vw, 3rem);
    color: #a8e6cf;
    margin-bottom: 20px;
    line-height: 1.3;
    word-wrap: break-word;
}

.hero-title i {
    margin-left: 10px;
    display: inline-block;
}

.hero-subtitle {
    font-size: clamp(1rem, 3vw, 1.5rem);
    color: #fff;
    margin-bottom: 30px;
    line-height: 1.7;
    word-wrap: break-word;
}

.hero-section .button {
    display: inline-block;
    background: #a8e6cf;
    color: #1a3c34;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: bold;
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.hero-section .button:hover {
    background: #dcedc1;
    transform: scale(1.05);
}

.button i {
    font-size: 1em;
    margin-left: 8px;
}

/* ===== Footer ===== */
footer {
    padding: 2rem 1rem;
    text-align: center;
    background: rgba(0, 0, 0, 0.3);
}

footer p {
    font-size: clamp(0.85rem, 2vw, 0.9rem);
    color: #e0e0e0;
    word-wrap: break-word;
}

.social-links {
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.social-links a {
    color: #a8e6cf;
    font-size: clamp(1.3rem, 3vw, 1.5rem);
    transition: color 0.3s ease;
}

.social-links a:hover {
    color: #dcedc1;
}

/* ===== Responsive Images ===== */
img {
    max-width: 100%;
    height: auto;
    display: block;
}

/* ===== Media Queries ===== */

/* Large Desktop */
@media (min-width: 1400px) {
    .hero-section {
        max-width: 1000px;
        padding: 80px 100px;
    }
}

/* Desktop */
@media (max-width: 1200px) {
    .hero-section {
        padding: 70px 70px;
    }
}

/* Tablet Landscape */
@media (max-width: 992px) {
    .hero-section {
        padding: 60px 50px;
        border-radius: 25px;
    }
}

/* Tablet Portrait */
@media (max-width: 768px) {
    main {
        min-height: calc(110vh - 150px);
    }
    
    .hero-section {
        padding: 50px 35px;
        border-radius: 20px;
    }
    
    .hero-section .button {
        padding: 13px 35px;
    }
    
    .bubbles .bubble {
        width: 50px !important;
        height: 50px !important;
    }
    
    .bubbles .bubble:nth-child(3) {
        width: 70px !important;
        height: 70px !important;
    }
}

/* Mobile Large */
@media (max-width: 576px) {
    main {
        min-height: calc(100vh - 120px);
    }
    
    .hero-section {
        padding: 45px 25px;
        border-radius: 18px;
    }
    
    .hero-section .button {
        padding: 12px 30px;
        width: 100%;
        max-width: 280px;
    }
    
    .button i {
        margin-left: 6px;
    }
    
    .social-links {
        gap: 1.2rem;
    }
}

/* Mobile Medium */
@media (max-width: 480px) {
    .hero-section {
        padding: 40px 22px;
    }
    
    .hero-title i {
        margin-left: 8px;
    }
}

/* Mobile Small */
@media (max-width: 400px) {
    .hero-section {
        padding: 35px 20px;
        border-radius: 15px;
    }
    
    .hero-section .button {
        padding: 11px 25px;
        width: 100%;
        max-width: 260px;
    }
    
    .bubbles .bubble {
        width: 40px !important;
        height: 40px !important;
    }
    
    .bubbles .bubble:nth-child(3) {
        width: 55px !important;
        height: 55px !important;
    }
}

/* Mobile Extra Small */
@media (max-width: 350px) {
    .hero-section {
        margin: 70px 8px 35px;
        padding: 35px 18px;
        margin-top: 110px;
    }
    
    .hero-section .button {
        padding: 10px 22px;
    }
}

/* Landscape Orientation for Mobile */
@media (max-height: 500px) and (orientation: landscape) {
    main {
        min-height: auto;
        padding: 15px;
    }
    
    .hero-section {
        padding: 30px 40px;
    }
    
    .hero-title {
        margin-bottom: 15px;
    }
    
    .hero-subtitle {
        margin-bottom: 20px;
    }
}

/* High Resolution Screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .hero-section {
        backdrop-filter: blur(15px);
    }
}
</style>

<main>
    <section class="hero-section">
        <h2 class="hero-title"><i class="fas fa-leaf"></i> مرحبًا بك في Impact Seed</h2>
        <p class="hero-subtitle">منصتك التفاعلية لزراعة بذور التغيير ومشاركة القصص الملهمة لخلق عالم أكثر خضرة!</p>
        <a href="../component/plantSeed.php" class="button"><i class="fas fa-seedling"></i> ازرع بذرتك الآن</a>
    </section>
</main>

<script>
// Fade-in animation on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, {
    threshold: 0.2
});

document.querySelectorAll('.hero-section').forEach(section => {
    observer.observe(section);
});
</script>
<script src="../js/nav.js"></script>
<?php
    include '../inc/footer.php';
?>
