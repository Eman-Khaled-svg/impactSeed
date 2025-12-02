const navBtn = document.getElementById('navBtn');
        const pagesList = document.querySelector('.pagesList');

        navBtn.addEventListener('click', function() {
            pagesList.classList.toggle('openList');
            
            // تغيير الأيقونة
            this.innerHTML = pagesList.classList.contains('openList') 
                ? '<i class="fa-solid fa-xmark"></i>' 
                : '<i class="fa-solid fa-bars"></i>';
        });

        // إغلاق الناف لما تضغط على لينك
        document.querySelectorAll('.pagesList a').forEach(link => {
            link.addEventListener('click', () => {
                pagesList.classList.remove('openList');
                navBtn.innerHTML = '<i class="fa-solid fa-bars"></i>';
            });
        });