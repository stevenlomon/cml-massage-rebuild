function addSwipe(el, onLeft, onRight) {
    let startX = 0;
    let startY = 0;
    let tracking = false;
    el.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        tracking = true;
    }, { passive: true });
    el.addEventListener('touchend', (e) => {
        if (!tracking) return;
        tracking = false;
        const dx = e.changedTouches[0].clientX - startX;
        const dy = e.changedTouches[0].clientY - startY;
        if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
            if (dx < 0) onLeft();
            else onRight();
        }
    }, { passive: true });
}

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

        addSwipe(track,
            () => { if (index < getMaxIndex()) { index++; update(); } },
            () => { if (index > 0) { index--; update(); } }
        );

        update();
    }

    const qualsCarousel = document.querySelector('.quals-carousel');
    if (qualsCarousel) {
        const qTrack = qualsCarousel.querySelector('.quals-track');
        const qCards = qTrack.querySelectorAll('.qual-card');
        const qPrev = document.querySelector('.quals-prev');
        const qNext = document.querySelector('.quals-next');
        const qBar = document.querySelector('.quals-progress-bar');
        const qTotal = qCards.length;
        let qIndex = 0;

        function getQVisible() {
            const w = qCards[0].offsetWidth;
            const gap = 28.8;
            return Math.floor((window.innerWidth - qTrack.offsetLeft) / (w + gap)) || 1;
        }

        function getQMax() {
            return Math.max(0, qTotal - getQVisible());
        }

        function updateQ() {
            const gap = 28.8;
            const offset = qIndex * (qCards[0].offsetWidth + gap);
            qTrack.style.transform = `translateX(-${offset}px)`;
            const maxIdx = getQMax();
            const progress = maxIdx > 0 ? ((qIndex + 1) / (maxIdx + 1)) * 100 : 100;
            qBar.style.width = `${progress}%`;
            qPrev.disabled = qIndex <= 0;
            qNext.disabled = qIndex >= maxIdx;
        }

        qPrev.addEventListener('click', () => { if (qIndex > 0) { qIndex--; updateQ(); } });
        qNext.addEventListener('click', () => { if (qIndex < getQMax()) { qIndex++; updateQ(); } });

        let qResize;
        window.addEventListener('resize', () => {
            clearTimeout(qResize);
            qResize = setTimeout(() => {
                if (qIndex > getQMax()) qIndex = getQMax();
                updateQ();
            }, 100);
        });

        addSwipe(qTrack,
            () => { if (qIndex < getQMax()) { qIndex++; updateQ(); } },
            () => { if (qIndex > 0) { qIndex--; updateQ(); } }
        );

        updateQ();
    }

    const treatReviews = document.querySelector('.treatment-reviews-carousel');
    if (treatReviews) {
        const tTrack = treatReviews.querySelector('.treatment-reviews-track');
        const tCards = tTrack.querySelectorAll('.review-card');
        const tPrev = document.querySelector('.treatment-reviews-prev');
        const tNext = document.querySelector('.treatment-reviews-next');
        const tBar = document.querySelector('.treatment-reviews-progress-bar');
        const tTotal = tCards.length;
        let tIndex = 0;

        function getTVisible() {
            const w = tCards[0].offsetWidth;
            const gap = 28.8;
            return Math.floor((window.innerWidth - tTrack.offsetLeft) / (w + gap)) || 1;
        }

        function getTMax() {
            return Math.max(0, tTotal - getTVisible());
        }

        function updateT() {
            const gap = 28.8;
            const offset = tIndex * (tCards[0].offsetWidth + gap);
            tTrack.style.transform = `translateX(-${offset}px)`;
            const maxIdx = getTMax();
            const progress = maxIdx > 0 ? ((tIndex + 1) / (maxIdx + 1)) * 100 : 100;
            tBar.style.width = `${progress}%`;
            tPrev.disabled = tIndex <= 0;
            tNext.disabled = tIndex >= maxIdx;
        }

        tPrev.addEventListener('click', () => { if (tIndex > 0) { tIndex--; updateT(); } });
        tNext.addEventListener('click', () => { if (tIndex < getTMax()) { tIndex++; updateT(); } });

        let tResize;
        window.addEventListener('resize', () => {
            clearTimeout(tResize);
            tResize = setTimeout(() => {
                if (tIndex > getTMax()) tIndex = getTMax();
                updateT();
            }, 100);
        });

        addSwipe(tTrack,
            () => { if (tIndex < getTMax()) { tIndex++; updateT(); } },
            () => { if (tIndex > 0) { tIndex--; updateT(); } }
        );

        updateT();
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
