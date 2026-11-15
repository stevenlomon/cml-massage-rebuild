<?php
declare(strict_types=1);

$page_title = 'Om Företaget – CML Massage & Wellness';
$page_description = 'Lär känna Nancy Lennartsson och historien bakom CML Massage & Wellness i Katrineholm. Grundat 2018 till minne av Clark Markus Lennartsson.';

require_once __DIR__ . '/src/helpers.php';
require __DIR__ . '/src/templates/header.php';

$qualifications = [
    ['type' => 'Diplom', 'title' => 'Spaterapeut', 'date' => 'Oktober 2021', 'school' => 'Axelsons Institute'],
    ['type' => 'Diplom', 'title' => 'Medicinsk massageterapeut', 'date' => 'Oktober 2020', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Positional release therapy och muskelenergiteknik', 'date' => 'Oktober 2020', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Rehabilitering och självbehandling', 'date' => 'Maj 2020', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Idrottsmedicin och skadelära', 'date' => 'Mars 2020', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Myofasciell teknik – Revolving', 'date' => 'Februari 2020', 'school' => 'Axelsons Institute'],
    ['type' => 'Diplom', 'title' => 'Massageterapeut', 'date' => 'December 2019', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Lymfmassage – fortsättningskurs', 'date' => 'November 2019', 'school' => 'Axelsons Institute'],
    ['type' => 'Diplom', 'title' => 'Friskvårdsmassör', 'date' => 'Oktober 2019', 'school' => 'Axelsons Institute'],
    ['type' => 'Kurs', 'title' => 'Koppning', 'date' => 'September 2019', 'school' => 'Axelsons Institute'],
];
?>

<section class="about-intro">
    <div class="container">
        <h1>Om Företaget</h1>
        <p>CML Massage &amp; Wellness grundades Januari 2018 av mig, Nancy Lennartsson. Det var dels för att följa i min mammas fotspår i healing och massage men också eftersom att 2017 förändrades mitt liv för alltid vilket gjorde att jag blev pushad till att starta detta företag.</p>
    </div>
</section>

<section class="about-banner">
    <div class="about-banner-image">
        <img src="/assets/images/salongen.jpg" alt="Massagesalongen CML Massage & Wellness i Katrineholm" width="957" height="474" loading="lazy">
    </div>
    <div class="about-banner-content">
        <h2>Idag blir massage allt mer nödvändigt</h2>
        <p>Idag är kroppsvärk och stress så pass vanligt att vi har accepterat det som en del av livet. Uppåt 50% av svenskar uppger att de har årliga ryggproblem eller nackbesvär. Det är vanliga problem och beror oftast på överbelastning, muskelsträckningar, eller stillasittande arbetsplatser.</p>
        <p>Min vision och önskemål är att informera och erbjuda en lösning till dessa problem. Jag vill att så många som möjligt ska kunna inkludera massage som en kontinuerlig rutin varje månad.</p>
    </div>
</section>

<section class="about-banner about-banner--reversed">
    <div class="about-banner-content">
        <h2>Varför jag startade företaget</h2>
        <p>Skolavslutningen 2016 fick jag ett kuvert från min son som är född 2003. Han bad mig att lägga brevet i ett bankfack &ndash; ett brev till hans framtida jag som han ville läsa när han fyller 33. Jag frågade men han ville inte ge några detaljer förutom att han skulle bli egenföretagare och företaget skulle heta CML efter hans namn: Clark Markus Lennartsson</p>
        <p>2017 gick Clark bort i en bilolycka vilket är det värsta som någonsin hänt mig och min familj. På begravningen lovade jag honom att bygga upp ett företag med initialerna CML. Eftersom att jag inte visste vad Clark ville ha för typ av företag så bestämde jag att det fick bli inom massage. Precis som min mamma ville sen jag var liten valde jag att följa hennes fotspår.</p>
    </div>
    <div class="about-banner-image">
        <img src="/assets/images/clarks-gravsten.jpg" alt="Nancys son Clarks gravsten" width="957" height="625" loading="lazy">
    </div>
</section>

<section class="qualifications">
    <div class="container">
        <p class="section-label">Kurs intyg, diplom och certifikat</p>
        <h2>Mina kvalifikationer</h2>
    </div>
    <div class="quals-carousel">
        <div class="quals-track">
            <?php foreach ($qualifications as $q): ?>
                <div class="qual-card">
                    <span class="qual-type"><?= e($q['type']) ?></span>
                    <h3><?= e($q['title']) ?></h3>
                    <p class="qual-date"><?= e($q['date']) ?></p>
                    <p class="qual-school"><?= e($q['school']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="quals-controls">
            <div class="quals-progress">
                <div class="quals-progress-bar"></div>
            </div>
            <div class="quals-nav">
                <button class="quals-prev quals-nav-btn" aria-label="Föregående">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="14 16 8 10 14 4"/></svg>
                </button>
                <button class="quals-next quals-nav-btn" aria-label="Nästa">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="8 4 14 10 8 16"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="promo-cards about-cta">
    <div class="container">
        <div class="split-banner">
            <div class="split-banner-content">
                <h2>Välkommen in på en behandling</h2>
                <p>För att din kropp ska kunna behålla sitt naturliga avslappnande tillstånd och kunna stå ut med all fysiskt och mentalt påfrestande stress i dagens samhälle, är det rekommenderat att delta i någon form av massage eller hälsoterapi minst en gång i månaden. Du bokar lätt din behandling genom att klicka på knappen nedan. Välj sedan den massagebehandling du vill ha och hur länge du vill ha den. Vänta med betalningen tills efter du har fått din massage.</p>
                <div><a href="/#behandlingar" class="btn btn-primary">Se Behandlingar</a></div>
            </div>
            <div class="split-banner-image">
                <img src="/assets/images/nancy-lennartsson.jpg" alt="Nancy Lennartsson, grundare av CML Massage & Wellness" width="957" height="681" loading="lazy">
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
