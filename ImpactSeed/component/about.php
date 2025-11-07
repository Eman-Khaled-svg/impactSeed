<?php
    include ('../inc/header.php');
    include ('../component/nav.php');
?>
<link rel="stylesheet" href="../css/about.css">
  <!-- Main Content -->
  <main>
    <!-- Hero Section -->
    <section class="hero-section">
      <h2 class="hero-title">عن Impact Seed</h2>
      <p class="hero-subtitle">منصة تفاعلية لزراعة بذور التغيير نحو عالم أكثر خضرة!</p>
      <button class="scroll-btn" aria-label="النزول إلى قسم عن المشروع">
        <span>اكتشف المزيد</span>
        <i class="fas fa-chevron-down"></i>
      </button>
    </section>

    <!-- About Developer Section -->
    <section class="about-developer">
      <div class="container">
        <div class="developer-img">
          <img src="../upload/IMG-20251016-WA0001.jpg" alt="صورة المطورة الشخصية" loading="lazy">
        </div>
        <div class="developer-text">
          <h3><i class="fas fa-user"></i> من أنا؟</h3>
          <p>
            أنا مطورة ويب شغوفة بالتكنولوجيا والبيئة. أؤمن أن التكنولوجيا يمكن أن تكون أداة قوية لتحقيق تغيير إيجابي. 
            من خلال Impact Seed، أجمع بين حبي للبرمجة واهتمامي بالنفسية لخلق منصة ملهمة تدعم المجتمعات في بناء مستقبل اكثر ترابطاً. 🌿
          </p>
        </div>
      </div>
    </section>

    <!-- About Project Section -->
    <section class="about-project">
      <div class="container">
        <h3 class="section-title"><i class="fas fa-globe"></i> عن مشروع Impact Seed</h3>
        <p class="section-description">
          Impact Seed هي منصة تفاعلية تهدف إلى تعزيز التوعية البيئية وتشجيع المشاركة المجتمعية من خلال مشاركة النصائح، القصص .
        </p>
        <div class="features">
          <h4><i class="fas fa-star"></i> المميزات الرئيسية</h4>
          <ul>
            <li><i class="fas fa-map-marked-alt"></i> خريطة تفاعلية لتتبع مواقع القصص والعبر  حول العالم</li>
            <li><i class="fas fa-leaf"></i> ناس من جميع الدول تتشارك كل قصصها وعبرها الجميله حول العالم </li>
            <li><i class="fas fa-users"></i> مجتمع نشط للتواصل ومشاركة التجارب</li>
            <li><i class="fas fa-lightbulb"></i> نصائح يومية للحياه </li>
            <li><i class="fas fa-chart-line"></i> تتبع تقدمك في رحلة العبر</li>
          </ul>
        </div>
        <div class="vision">
          <h4><i class="fas fa-bullseye"></i> رؤيتنا</h4>
          <p>نسعى لتمكين الأفراد والمجتمعات من زراعة بذور التغيير لخلق كوكب أكثر صحه وترابطًا.</p>
        </div>
        <div class="join-us">
          <h4><i class="fas fa-heart"></i> انضم إلينا</h4>
          <p>كل بذرة تزرعها هي خطوة نحو مستقبل أخضر. انضم إلى Impact Seed اليوم وكن جزءًا من التغيير!</p>
        </div>
      </div>
    </section>
  </main>

 

  <!-- JavaScript -->
  <script>
    // Smooth scroll for button
    document.querySelector('.scroll-btn').addEventListener('click', () => {
      document.querySelector('.about-developer').scrollIntoView({ 
        behavior: 'smooth', 
        block: 'start' 
      });
    });

    // Fade-in animation on scroll
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.2 });

    document.querySelectorAll('.about-developer, .about-project').forEach(section => {
      observer.observe(section);
    });
  </script>
<?php
    include ('../inc/footer.php')
?>