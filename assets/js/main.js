document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('#main-nav');
    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const expanded = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!expanded));
            nav.classList.toggle('is-open');
        });
    }

    const hero = document.querySelector('.hero');
    const header = document.querySelector('.site-header');
    if (hero && header && document.body.classList.contains('has-hero')) {
        const observer = new IntersectionObserver(([entry]) => {
            header.classList.toggle('scrolled', !entry.isIntersecting);
        }, { threshold: 0.1 });
        observer.observe(hero);
    }

    const carousel = document.querySelector('.reviews-carousel');
    if (carousel) {
        const track = carousel.querySelector('.reviews-track');
        const cards = track.querySelectorAll('.review-card');
        const prevBtn = document.querySelector('.reviews-prev');
        const nextBtn = document.querySelector('.reviews-next');
        const progressBar = document.querySelector('.reviews-progress-bar');
        const total = cards.length;
        let index = 0;

        function getVisibleCount() {
            const cardWidth = cards[0].offsetWidth;
            const gap = 28.8;
            return Math.floor((window.innerWidth - track.offsetLeft) / (cardWidth + gap)) || 1;
        }

        function getMaxIndex() {
            return Math.max(0, total - getVisibleCount());
        }

        function update() {
            const card = cards[0];
            const gap = 28.8;
            const offset = index * (card.offsetWidth + gap);
            track.style.transform = `translateX(-${offset}px)`;

            const maxIdx = getMaxIndex();
            const progress = maxIdx > 0 ? ((index + 1) / (maxIdx + 1)) * 100 : 100;
            progressBar.style.width = `${progress}%`;

            prevBtn.disabled = index <= 0;
            nextBtn.disabled = index >= maxIdx;
        }

        prevBtn.addEventListener('click', () => {
            if (index > 0) { index--; update(); }
        });

        nextBtn.addEventListener('click', () => {
            if (index < getMaxIndex()) { index++; update(); }
        });

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (index > getMaxIndex()) index = getMaxIndex();
                update();
            }, 100);
        });

        update();
    }

    const textarea = document.querySelector('.contact-form textarea');
    if (textarea) {
        const charEl = document.querySelector('.char-count');
        const wordEl = document.querySelector('.word-count');
        textarea.addEventListener('input', () => {
            const val = textarea.value;
            charEl.textContent = val.length;
            wordEl.textContent = val.trim() === '' ? 0 : val.trim().split(/\s+/).length;
        });
    }
});
