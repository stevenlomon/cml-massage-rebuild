<?php
declare(strict_types=1);

$page_title = 'Presentkort och Massagekort – CML Massage & Wellness';
$page_description = 'Ge bort avslappning med CML Massage & Wellness presentkort. Välj valfritt belopp, giltigt i ett år. Kan även användas med friskvårdsbidraget.';

require_once __DIR__ . '/src/helpers.php';
require __DIR__ . '/src/templates/header.php';
?>

<section class="about-intro">
    <div class="container">
        <h1>Presentkort och massagekort</h1>
        <p>Presentera välbefinnande med stil och överraska någon speciell eller varför inte unna dig själv full avslappning? Utforska CML Massage &amp; Wellness kort alternativ, kontakta gärna mig om du har några frågor.</p>
    </div>
</section>

<section class="about-banner">
    <div class="about-banner-image">
        <img src="/assets/images/presentkort-hero.jpg" alt="Presentkort på för CML Massage & Wellness" width="880" height="616" loading="lazy">
    </div>
    <div class="about-banner-content">
        <h2>Presentkort</h2>
        <p class="presentkort-validity">Gäller 1 år</p>
        <p>Ge bort avslappning och välbefinnande med CML Massage &amp; Wellness presentkort. Välj ett valfritt belopp och låt mottagaren njuta av professionell massage. Kortet är giltigt i ett år, och kan även användas med friskvårds bidraget.</p>
        <p>Observera att om det köps med friskvårds bidrag kan endast den som köper det använda det eftersom arbetsgivaren betalar ditt friskvårds bidrag och inte någon annans.</p>
        <div><a href="/#kontakt" class="btn btn-primary">Köp Online</a></div>
        <img src="/assets/images/checkout-badges.svg" alt="Visa, American Express, Mastercard, Klarna, Google Pay, BankID" class="payment-badges" width="249" height="26" loading="lazy">
    </div>
</section>

<section class="promo-cards presentkort-cta">
    <div class="container">
        <div class="split-banner">
            <div class="split-banner-content">
                <h2>Hur kan du uppleva ett friskare du?</h2>
                <p>På CML Massage &amp; Wellness anser vi att det alltid är bättre och billigare att investera i hälsovård än att betala för onödig sjukvård i framtiden. Vi förstår att dagens samhälle är väldigt stressigt och det är inte ovanligt att man bygger upp mycket spänningar i kroppen och inte märker det förrän smärtan redan är framme. Det är därför rekommenderat från att gå på någon form av hälsoterapi minst en gång i månaden.</p>
                <div><a href="/#behandlingar" class="btn btn-primary">Se Behandlingar</a></div>
            </div>
            <div class="split-banner-image">
                <img src="/assets/images/massage-oljor.jpg" alt="Massage krämer och oljor" width="1024" height="729" loading="lazy">
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
