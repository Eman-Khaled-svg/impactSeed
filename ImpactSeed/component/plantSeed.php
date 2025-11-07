<?php include '../inc/header.php'; ?>
<?php
    include '../component/nav.php';
    include '../config/data.php';

    
?>




<link rel="stylesheet" href="../css/plantSeed.css">

    <!-- صفحة الزراعة -->
    <section class="plant-section">
        <h2 class="section-title">خريطة المجتمع الوهمية</h2>
        <canvas id="map" width="800" height="400"></canvas>
        <p class="hint">انقر على الخريطة لاختيار موقع بذرتك</p>

        <h3 class="section-title">ازرع بذرة جديدة</h3>
        <form id="seed-form" action="../component/save_seed.php" method="POST">
            <input type="text" name="author" placeholder="اسمك" required>
            <input type="text" name="title" placeholder="عنوان البذرة" required>
            <textarea name="story" placeholder="قصتك أو فكرتك..." required></textarea>
            <input type="hidden" name="x" id="x">
            <input type="hidden" name="y" id="y">
            <button type="submit">ازرع البذرة</button>
        </form>
        <div id="msg" style="text-align:center; margin-top:15px; font-weight:bold;"></div>
    </section>

    <!-- قسم المجتمع -->
    <section class="community-section">
        <h3 class="section-title">بذور المجتمع</h3>
        <a href="../component/community.php" class="button">ادخل المجتمع</a>
    </section>

    <!-- الفوتر -->
    <footer>
        <p>معًا، نزرع بذور التغيير - فكرة تلو الأخرى</p>
    </footer>

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
            
            // نرسم العلامة
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
            
            msg.innerHTML = `<span style="color:#dcedc1;">تم اختيار الموقع: (${x}, ${y})</span>`;
        };

        // أنيميشن الظهور
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.plant-section, .community-section').forEach(sec => {
            observer.observe(sec);
        });
    </script>


<?php include '../inc/footer.php'; ?>