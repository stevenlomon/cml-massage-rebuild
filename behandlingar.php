<?php
declare(strict_types=1);

require_once __DIR__ . '/src/helpers.php';

$slug = $_GET['slug'] ?? '';
$service = get_service_by_slug($slug);
$treatment = get_treatment_by_slug($slug);

if (!$service || !$treatment) {
    http_response_code(404);
    $page_title = 'Sidan hittades inte – CML Massage & Wellness';
    $page_description = '';
    require __DIR__ . '/src/templates/header.php';
    echo '<section class="about-intro"><div class="container"><h1>404 – Sidan hittades inte</h1><p>Behandlingen du söker finns inte. <a href="/#behandlingar">Se alla behandlingar</a>.</p></div></section>';
    require __DIR__ . '/src/templates/footer.php';
    exit;
}

$salon = get_salon_data();
$page = 'behandlingar';
$page_title = $service['title'] . ' – CML Massage & Wellness';
$page_description = $service['long_description'];

require __DIR__ . '/src/templates/header.php';

$check_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22" fill="var(--color-accent)"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>';
?>

<section class="treatment-hero">
    <div class="treatment-hero-content">
        <h1><?= e($treatment['hero_heading']) ?></h1>
        <p><?= e($treatment['hero_description']) ?></p>
        <ul class="treatment-benefits">
            <?php foreach ($service['benefits'] as $benefit): ?>
                <li><?= $check_svg ?> <strong><?= e($benefit) ?></strong></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="treatment-hero-image">
        <img src="/assets/images/<?= e($service['image']) ?>" alt="<?= e($service['title']) ?> på CML Massage & Wellness" width="957" height="640" loading="eager">
    </div>
</section>

<?php if ($treatment['how_it_works_heading']): ?>
<?php $banner_img = $treatment['banner_image'] ?? $service['image']; ?>
<section class="about-banner">
    <div class="about-banner-image">
        <img src="/assets/images/<?= e($banner_img) ?>" alt="<?= e($service['title']) ?>" width="957" height="640" loading="lazy">
    </div>
    <div class="about-banner-content">
        <h2><?= e($treatment['how_it_works_heading']) ?></h2>
        <?php foreach ($treatment['how_it_works_paragraphs'] as $p): ?>
            <p><?= e($p) ?></p>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($treatment['extra_sections'] ?? [])): ?>
    <?php foreach ($treatment['extra_sections'] as $i => $section): ?>
    <?php $section_img = $section['image'] ?? $service['image']; ?>
    <?php $reversed = $i % 2 !== 0; ?>
    <section class="about-banner <?= $reversed ? 'about-banner--reversed' : '' ?>">
        <?php if ($reversed): ?>
        <div class="about-banner-content">
            <h2><?= e($section['heading']) ?></h2>
            <?php foreach ($section['paragraphs'] as $p): ?>
                <p><?= e($p) ?></p>
            <?php endforeach; ?>
        </div>
        <div class="about-banner-image">
            <img src="/assets/images/<?= e($section_img) ?>" alt="<?= e($section['heading']) ?>" width="957" height="640" loading="lazy">
        </div>
        <?php else: ?>
        <div class="about-banner-image">
            <img src="/assets/images/<?= e($section_img) ?>" alt="<?= e($section['heading']) ?>" width="957" height="640" loading="lazy">
        </div>
        <div class="about-banner-content">
            <h2><?= e($section['heading']) ?></h2>
            <?php foreach ($section['paragraphs'] as $p): ?>
                <p><?= e($p) ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>
    <?php endforeach; ?>
<?php endif; ?>

<section class="treatment-booking">
    <div class="container">
        <h2><?= e($treatment['booking_heading']) ?></h2>
        <p class="treatment-booking-intro"><?= e($treatment['booking_intro']) ?></p>
        <div class="booking-cards-grid">
            <?php foreach ($treatment['booking_cards'] as $card): ?>
                <a href="<?= e($card['bokadirekt_url']) ?>" class="booking-card" target="_blank" rel="noopener">
                    <h3><?= e($card['label']) ?></h3>
                    <div class="booking-card-details">
                        <span class="booking-card-price">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16" fill="currentColor"><path d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <?= e((string) $card['price']) ?> kr
                        </span>
                        <span class="booking-card-duration">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" fill="currentColor"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <?= e($card['duration']) ?>
                        </span>
                    </div>
                    <span class="booking-card-cta">Boka <span aria-hidden="true">→</span></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($treatment['reviews'])): ?>
<section class="treatment-reviews">
    <div class="container">
        <div class="section-label">Vad säger kunderna?</div>
        <h2>Vad kunderna säger om <?= e($service['title']) ?></h2>
        <div class="treatment-rating">
            <?php
            $star_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="20" height="20" fill="#e8b923"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22.2 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.4 11.4-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>';
            echo str_repeat($star_svg, 5);
            ?>
            <strong><?= e((string) $salon['rating']['value']) ?> Fantastisk Bra</strong>
            <span>( <?= e(number_format($salon['rating']['count'], 0, ',', ' ')) ?> betyg)</span>
        </div>
    </div>
    <div class="treatment-reviews-carousel">
        <div class="treatment-reviews-track">
            <?php foreach ($treatment['reviews'] as $review): ?>
                <div class="review-card">
                    <div class="review-stars">
                        <?= str_repeat('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="18" fill="#e8b923"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22.2 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.4 11.4-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>', 5) ?>
                    </div>
                    <h3 class="review-heading"><?= e($review['heading']) ?></h3>
                    <p class="review-quote"><?= e($review['quote']) ?></p>
                    <div class="review-author">
                        <strong><?= e($review['name']) ?></strong>
                        <span>CML Massage &amp; Wellness Kund</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="treatment-reviews-controls">
            <div class="treatment-reviews-progress">
                <div class="treatment-reviews-progress-bar"></div>
            </div>
            <div class="treatment-reviews-nav">
                <button class="treatment-reviews-prev quals-nav-btn" aria-label="Föregående">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="14 16 8 10 14 4"/></svg>
                </button>
                <button class="treatment-reviews-next quals-nav-btn" aria-label="Nästa">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="8 4 14 10 8 16"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
