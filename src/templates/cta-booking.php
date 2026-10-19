<?php
declare(strict_types=1);
$cta_heading = $cta_heading ?? 'Hur kan du uppleva ett friskare du?';
$cta_text = $cta_text ?? 'På CML Massage & Wellness anser vi att det alltid är bättre och billigare att investera i hälsovård än att betala för onödig sjukvård i framtiden. Vi förstår att dagens samhälle är väldigt stressigt och det är inte ovanligt att man bygger upp mycket spänningar i kroppen och inte märker det förrän smärtan redan är framme. Det är därför rekommenderat från att gå på någon form av hälsoterapi minst en gång i månaden.';
$cta_button_text = $cta_button_text ?? 'Se Behandlingar';
$cta_button_url = $cta_button_url ?? '/behandlingar.php';
?>
<section class="cta-banner">
    <div class="container">
        <div class="cta-card">
            <div class="cta-content">
                <h2><?= e($cta_heading) ?></h2>
                <p><?= e($cta_text) ?></p>
                <a href="<?= e($cta_button_url) ?>" class="btn btn-primary"><?= e($cta_button_text) ?></a>
            </div>
            <div class="cta-image">
                <img src="/assets/images/salongen.jpg" alt="CML Massage & Wellness salong" width="500" height="350" loading="lazy">
            </div>
        </div>
    </div>
</section>
