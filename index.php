<?php
declare(strict_types=1);
require_once __DIR__ . '/src/templates/header.php';
$salon = get_salon_data();
$services = get_services();
$featured = array_filter($services, fn($s) => $s['featured'] ?? false);
?>

<!-- Hero -->
<section class="hero" style="background-image: url('/assets/images/hero.jpg')">
    <div class="container">
        <h1>Massagebehandling i Katrineholm för ett friskare du</h1>
        <p>Många av oss bär på mycket underliggande stress och spänningar. På CML Massage &amp; Wellness får du avkopplingen du längtar efter i en hemtrevlig miljö, så du kan bli mer produktiv och energifylld dagen ut.</p>
        <div class="hero-actions">
            <a href="/behandlingar.php" class="btn btn-primary">Se Behandlingar</a>
            <div class="hero-rating">
                <span class="stars">★★★★★</span>
                <span><strong><?= $salon['rating']['value'] ?> Fantastisk Bra</strong> (<?= $salon['rating']['count'] ?> betyg)</span>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="benefits">
    <div class="container">
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-2.2 0-4 1.8-4 4v2c-3.3 1.5-6 4.5-6 8.5 0 3 1.5 5.5 3.5 7.5l-5 5c-.8.8-.8 2 0 2.8L16 37.3c.8.8 2 .8 2.8 0l5-5c.7.1 1.4.2 2.2.2h-2c.8 0 1.5-.1 2.2-.2l5 5c.8.8 2 .8 2.8 0l3.5-3.5c.8-.8.8-2 0-2.8l-5-5c2-2 3.5-4.5 3.5-7.5 0-4-2.7-7-6-8.5V8c0-2.2-1.8-4-4-4z"/></svg>
                </div>
                <h3>Balansera humöret</h3>
                <p>Finn ett gladare och mer balanserat humör dagen ut med mer energi.</p>
            </div>
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm0 36c-8.84 0-16-7.16-16-16S15.16 8 24 8s16 7.16 16 16-7.16 16-16 16zm-2-26h3v12h-3zm8-2l2.5 2.5L28 19l-2.5-2.5z"/></svg>
                </div>
                <h3>Återställ dygnsrytmen</h3>
                <p>Få tillbaka din normala dygnsrytm och få den kvalitésömn du behöver.</p>
            </div>
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 6c-1.1 0-2 .9-2 2v4h4V8c0-1.1-.9-2-2-2zm0 10c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10zm-8 10c0-4.4 3.6-8 8-8v8h8c0 4.4-3.6 8-8 8s-8-3.6-8-8z"/></svg>
                </div>
                <h3>Bli mer produktiv</h3>
                <p>Känn dig mer fokuserad på din arbetsplats och prestera bättre.</p>
            </div>
        </div>
    </div>
</section>

<!-- Treatment Preview -->
<section class="bg-light" style="padding: 4rem 0;">
    <div class="container">
        <div class="section-label">Vilken behandling längtar du efter?</div>
        <div class="section-header">
            <h2>Utforska CML Massage &amp; Wellness behandlingar</h2>
            <p>Här hittar du allt från Klassisk massage till spa-behandlingar. Om du har några frågor angående en behandling, tveka inte att kontakta mig.</p>
        </div>
        <div class="treatments-grid">
            <?php foreach (array_slice($featured, 0, 6) as $service): ?>
                <a href="/behandlingar.php#<?= e($service['id']) ?>" class="treatment-card" style="background-image: url('/assets/images/<?= e($service['image']) ?>')">
                    <div class="treatment-card-content">
                        <h3><?= e($service['title']) ?></h3>
                        <p><?= e($service['description']) ?></p>
                        <span class="read-more">Läs mer →</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- IR Bastu Banner -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="split-banner">
            <div class="split-banner-image">
                <img src="/assets/images/ir-bastu.jpg" alt="IR Bastu på CML Massage & Wellness" width="600" height="400" loading="lazy">
            </div>
            <div class="split-banner-content">
                <h2>Välj gärna till IR Bastu till din massage!</h2>
                <p>Du kan numera välja till IR bastu till din favorit behandling! IR bastu har många fördelar och hjälper mig komma in djupare under massagens gång då det mjuknar upp kroppen.</p>
                <ul class="check-list">
                    <li>Hjälper sänka blodtrycket</li>
                    <li>Mjukar upp spända muskler</li>
                    <li>Ökar kroppens förbränning</li>
                </ul>
                <div><a href="/behandlingar.php#ir-bastu-och-massage" class="btn btn-primary">Läs mer</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Friskvård Partners -->
<section class="partners">
    <div class="container">
        <h2><strong>Friskvårds samarbeten</strong></h2>
        <p>Du kan enkelt boka din massage genom Epassi, Benify eller Wellnet och också då betala med ditt friskvårds bidrag.</p>
        <div class="partner-logos">
            <img src="/assets/images/epassi.svg" alt="Epassi" width="120" height="60" loading="lazy">
            <img src="/assets/images/benify.svg" alt="Benify – Godkänd partner" width="80" height="80" loading="lazy">
            <img src="/assets/images/wellnet.svg" alt="Wellnet" width="120" height="60" loading="lazy">
        </div>
    </div>
</section>

<!-- About Nancy -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="split-banner">
            <div class="split-banner-image">
                <img src="/assets/images/nancy-lennartsson.jpg" alt="<?= e($salon['owner']) ?> framför CML Massage & Wellness" width="600" height="500" loading="lazy">
            </div>
            <div class="split-banner-content">
                <h2>Din friskvårdsmassör i Katrineholm</h2>
                <p>Jag förstår hur det känns när ens kropp är överbelastad av stress och allt känns tungt, då vill man bara koppla av.</p>
                <p>Jag jobbar ständigt för att mina kunder ska kunna känna sig som hemma och få en toppenupplevelse.</p>
                <p>Här kan ni slappna av, lämna all stress, huvudvärk och fysisk oro som manifesteras i kroppen som bara tynger ner en.</p>
                <a href="/kontakt.php" class="btn btn-primary">Läs mer</a>
            </div>
        </div>
    </div>
</section>

<!-- How to Book -->
<section class="steps">
    <div class="container">
        <h2>Hur du bokar din behandling</h2>
        <p>Du bokar snabbt och enkelt genom bokadirekt. Har du några frågor angående bokning, hör gärna av dig!</p>
        <div class="steps-grid">
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M30 10H18c-1.1 0-2 .9-2 2v24c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V12c0-1.1-.9-2-2-2zm-6 26c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-6H18V14h12v16z"/></svg>
                </div>
                <h3>Välj din behandling</h3>
                <p>Välj massagebehandling och hur länge du vill ha den.</p>
            </div>
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M34 22H26V14h-4v8H14v4h8v8h4v-8h8z M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm0 36c-8.84 0-16-7.16-16-16S15.16 8 24 8s16 7.16 16 16-7.16 16-16 16z"/></svg>
                </div>
                <h3>Utse bästa tiden</h3>
                <p>Välj tid och datum genom bokningsportalen.</p>
            </div>
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm0 36c-8.84 0-16-7.16-16-16S15.16 8 24 8s16 7.16 16 16-7.16 16-16 16zm-2-26h3v12h-3zm0 16h3v3h-3z"/></svg>
                </div>
                <h3>Betala i lugn o ro</h3>
                <p>Betala genom Swish, kort, Klarna eller på salongen.</p>
            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
<section class="reviews">
    <div class="container">
        <div class="section-label">Vad säger kunderna?</div>
        <h2>CML Massage &amp; Wellness är älskat av hundratals personer i Katrineholm</h2>
        <div class="hero-rating" style="margin: 1rem 0 2rem; color: var(--color-text);">
            <span class="stars">★★★★★</span>
            <span><strong><?= $salon['rating']['value'] ?> Fantastisk Bra</strong> (<?= $salon['rating']['count'] ?> betyg)</span>
        </div>
        <div class="reviews-scroll">
            <div class="review-card">
                <div class="stars">★★★★★</div>
                <p class="review-title">Musklerna fick sig en skön och noggrann genomgång. Nancy är en mycket duktig massör!</p>
                <p class="review-text">Besöket hos Nancy gjorde mig så avslappnad och lugn. Musklerna fick sig en skön och noggrann genomgång. Nancy är en mycket duktig massör.</p>
                <p class="reviewer">Eleonor F.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars">★★★★★</div>
                <p class="review-title">Min personliga favorit är Koppningen!</p>
                <p class="review-text">Jag har testat Aroma Thaimassage, Djupvävsmassage och Koppning. Alla 3 var riktigt bra men min personliga favorit är Koppningen. Nancy är väldigt professionell i sitt jobb. Rekommenderas!</p>
                <p class="reviewer">Sara S.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars">★★★★★</div>
                <p class="review-title">Är själv certifierad massör och kräsen men det här är världsklass på flera nivåer!</p>
                <p class="review-text">Som alltid den bästa massagen ever … Så avslappnad, ompysslad och full av energi efteråt. Jag är själv certifierad massör och kräsen men det här är världsklass på flera nivåer med små detaljer som ger extra guldkant och gör att du som kund känner dig trygg hela vägen.</p>
                <p class="reviewer">Anki S.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars">★★★★★</div>
                <p class="review-title">Bland den bästa massagen jag gått på!</p>
                <p class="review-text">Jag fick en djupvävsmassage och det var otroligt bra! Bland den bästa massagen jag gått på. Rekommenderar verkligen!</p>
                <p class="reviewer">Sara K.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<?php require __DIR__ . '/src/templates/cta-booking.php'; ?>

<!-- Contact -->
<section class="bg-light" style="padding: 4rem 0;" id="kontakt">
    <div class="container">
        <div class="section-label">Funderar du över något?</div>
        <div class="contact-grid">
            <div>
                <p style="margin-bottom: 1.5rem;">Har du frågor om behandlingar, bokning eller friskvård? Kontakta mig direkt via telefon eller e-post.</p>
                <a href="mailto:<?= e($salon['email']) ?>?subject=Fråga%20från%20hemsidan" class="btn btn-primary">Skicka e-post</a>
                <a href="tel:<?= e($salon['phone']) ?>" class="btn btn-primary" style="margin-left: 0.5rem;">Ring mig</a>
            </div>
            <div class="contact-info">
                <h2>Kontakta mig</h2>
                <p>Om det är brådskande kan jag nås på numret under. Svarar jag inte är jag förmodligen med en kund men ringer tillbaka till dig så snabbt jag kan!</p>
                <p>Hälsningar,<br><?= e($salon['owner']) ?></p>
                <div class="contact-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.91 15.91 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.27c1.21.49 2.53.76 3.89.76a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.07 21 3 13.93 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.36.27 2.68.76 3.89a1 1 0 0 1-.27 1.11l-2.37 2.79z"/></svg>
                    <a href="tel:<?= e($salon['phone']) ?>"><?= e($salon['phone']) ?></a>
                </div>
                <div class="contact-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <a href="mailto:<?= e($salon['email']) ?>"><?= e($salon['email']) ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="map">
    <div class="container">
        <h2>Hitta hit</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2055.534269191228!2d16.181223876965753!3d58.98951307445157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465eb7b8e97d0eb1%3A0xa1076e4006c66124!2sCML%20Massage%20%26%20Wellness!5e0!3m2!1sen!2sse!4v1716310594330!5m2!1sen!2sse" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="CML Massage & Wellness på kartan"></iframe>
    </div>
</section>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
