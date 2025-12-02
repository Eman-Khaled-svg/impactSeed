
  <!-- Main Content -->
   <link rel="stylesheet" href="./css/style.css">
  <main>
    <section class="hero-section">
      <h2 class="hero-title"><i class="fas fa-leaf"></i> مرحبًا بك في Impact Seed</h2>
      <p class="hero-subtitle">منصتك التفاعلية لزراعة بذور التغيير ومشاركة القصص الملهمة لخلق عالم أكثر خضرة!</p>
      <a href="./component/plantSeed.php" class="button"><i class="fas fa-seedling"></i> ازرع بذرتك الآن</a>
    </section>
  </main>

  <!-- JavaScript -->
   <script src="./js/script.js"></script>
  <script>
    // Fade-in animation on scroll
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.2 });

    document.querySelectorAll('.hero-section').forEach(section => {
      observer.observe(section);
    });
  </script>
