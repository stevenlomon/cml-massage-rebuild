<?php
declare(strict_types=1);
$page_title = 'Kontakt – CML Massage & Wellness | Katrineholm';
$page_description = 'Kontakta CML Massage & Wellness i Katrineholm. Ring, mejla eller boka din massage via Bokadirekt. Adress: Tallbacken 26, 641 51 Katrineholm.';
require_once __DIR__ . '/src/templates/header.php';
$salon = get_salon_data();
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="section-label">Kontakt</div>
        <h1>Kontakta CML Massage &amp; Wellness</h1>
        <p>Har du frågor om behandlingar, bokning eller friskvård? Tveka inte att höra av dig — jag hjälper dig gärna!</p>
    </div>
</section>

<!-- Contact Info + Opening Hours -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Hör av dig</h2>
                <p>Om det är brådskande kan jag nås på telefonnumret nedan. Svarar jag inte är jag förmodligen med en kund men ringer tillbaka till dig så snabbt jag kan!</p>
                <p>Hälsningar,<br><?= e($salon['owner']) ?></p>
                <div class="contact-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.91 15.91 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.21.49 2.53.76 3.89.76a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.07 21 3 13.93 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.36.27 2.68.76 3.89a1 1 0 0 1-.27 1.11l-2.37 2.79z"/></svg>
                    <a href="tel:<?= e($salon['phone']) ?>"><?= e($salon['phone']) ?></a>
                </div>
                <div class="contact-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <a href="mailto:<?= e($salon['email']) ?>"><?= e($salon['email']) ?></a>
                </div>
                <div class="contact-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>
                    <span><?= e($salon['address']['street']) ?>, <?= e($salon['address']['postal']) ?> <?= e($salon['address']['city']) ?></span>
                </div>
            </div>
            <div class="contact-info">
                <h2>Öppetider</h2>
                <dl class="opening-hours">
                    <?php foreach ($salon['opening_hours'] as $day => $hours): ?>
                        <div>
                            <dt><?= e($day) ?></dt>
                            <dd><?= e($hours) ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
                <div style="margin-top: 2rem;">
                    <a href="<?= e(get_booking_url()) ?>" class="btn btn-primary" target="_blank" rel="noopener">Boka via Bokadirekt</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="map">
    <div class="container">
        <h2>Hitta hit</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2055.534269191228!2d16.181223876965753!3d58.98951307445157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465eb7b8e97d0eb1%3A0xa1076e4006c66124!2sCML%20Massage%20%26%20Wellness!5e0!3m2!1sen!2sse!4v1716310594330!5m2!1sen!2sse" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CML Massage &amp; Wellness på kartan"></iframe>
    </div>
</section>

<!-- CTA -->
<?php
$cta_heading = 'Redo att boka?';
$cta_text = 'Boka din massage snabbt och enkelt genom Bokadirekt. Välj behandling, hitta en tid som passar dig och betala med Swish, kort, Klarna eller på plats.';
$cta_button_text = 'Boka Nu';
$cta_button_url = get_booking_url();
require __DIR__ . '/src/templates/cta-booking.php';
?>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
