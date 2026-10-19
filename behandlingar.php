<?php
declare(strict_types=1);
$page_title = 'Behandlingar – CML Massage & Wellness';
$page_description = 'Utforska alla massagebehandlingar hos CML Massage & Wellness i Katrineholm. Svensk klassisk massage, djupvävnadsmassage, lymfmassage, hot stone och mer.';
require_once __DIR__ . '/src/templates/header.php';
$services = get_services();
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="section-label">Våra Behandlingar</div>
        <h1>Utforska alla behandlingar</h1>
        <p>Här hittar du allt från klassisk massage till lyxiga spa-behandlingar. Välj den behandling som passar dig bäst och boka enkelt via Bokadirekt.</p>
    </div>
</section>

<!-- Treatments -->
<?php foreach ($services as $index => $service): ?>
<?php $has_labels = !empty(array_filter($service['options'], fn($o) => isset($o['label']))); ?>
<section class="treatment-detail<?= $index % 2 === 1 ? ' bg-light' : '' ?>" id="<?= e($service['id']) ?>">
    <div class="container">
        <div class="treatment-detail-grid<?= $index % 2 === 1 ? ' reverse' : '' ?>">
            <div class="treatment-detail-image">
                <img src="/assets/images/<?= e($service['image']) ?>" alt="<?= e($service['title']) ?> hos CML Massage &amp; Wellness" width="600" height="400" loading="lazy">
            </div>
            <div class="treatment-detail-content">
                <h2><?= e($service['title']) ?></h2>
                <p><?= e($service['long_description']) ?></p>
                <ul class="treatment-benefits">
                    <?php foreach ($service['benefits'] as $benefit): ?>
                        <li><?= e($benefit) ?></li>
                    <?php endforeach; ?>
                </ul>
                <table class="pricing-table">
                    <thead>
                        <tr>
                            <?php if ($has_labels): ?><th>Alternativ</th><?php endif; ?>
                            <th>Tid</th>
                            <th>Pris</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($service['options'] as $option): ?>
                            <tr>
                                <?php if ($has_labels): ?><td><?= e($option['label'] ?? '') ?></td><?php endif; ?>
                                <td><?= e($option['duration']) ?></td>
                                <td class="price"><?= e(number_format($option['price'], 0, ',', ' ') . ' kr') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?= e(get_booking_url($service['id'])) ?>" class="btn btn-primary" target="_blank" rel="noopener">Boka <?= e($service['title']) ?></a>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<!-- CTA -->
<?php
$cta_heading = 'Redo att boka din behandling?';
$cta_text = 'Boka snabbt och enkelt genom Bokadirekt. Välj din favoritbehandling, hitta en tid som passar dig och betala smidigt med Swish, kort, Klarna eller på plats i salongen.';
$cta_button_text = 'Boka Nu';
$cta_button_url = get_booking_url();
require __DIR__ . '/src/templates/cta-booking.php';
?>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
