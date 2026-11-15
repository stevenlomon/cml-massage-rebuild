<?php
declare(strict_types=1);
$cta_heading = $cta_heading ?? 'Hur kan du uppleva ett friskare du?';
$cta_button_text = $cta_button_text ?? 'Se Behandlingar';
$cta_button_url = $cta_button_url ?? '/behandlingar.php';
?>
<section class="promo-cards cta-booking">
    <div class="container">
        <div class="split-banner">
            <div class="split-banner-content">
                <h2><?= e($cta_heading) ?></h2>
                <p>På CML Massage &amp; Wellness anser vi att det alltid är bättre och billigare att investera i hälsovård än att betala för onödig sjukvård i framtiden.</p>
                <p>Vi förstår att dagens samhälle är väldigt stressigt och det är inte ovanligt att man bygger upp mycket spänningar i kroppen och inte märker det förrän smärtan redan är framme. Det är därför rekommenderat från att gå på någon form av hälsoterapi minst en gång i månaden.</p>
                <div><a href="<?= e($cta_button_url) ?>" class="btn btn-primary"><?= e($cta_button_text) ?></a></div>
            </div>
            <div class="split-banner-image">
                <img src="/assets/images/upplev-friskare-du.jpg" alt="CML Massage & Wellness salong med handdukar vikta som svanar" width="1200" height="854" loading="lazy">
            </div>
        </div>
    </div>
</section>
