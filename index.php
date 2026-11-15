<?php
declare(strict_types=1);
require_once __DIR__ . '/src/templates/header.php';
$salon = get_salon_data();
$services = get_services();
$preview = array_filter($services, fn($s) => $s['id'] !== 'ir-bastu-och-massage');
$star_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none"><path d="M3.612 15.443C3.226 15.641 2.788 15.294 2.866 14.851L3.696 10.121L0.173 6.765C-0.156 6.451 0.015 5.877 0.456 5.815L5.354 5.119L7.538 0.792C7.735 0.402 8.268 0.402 8.465 0.792L10.649 5.119L15.547 5.815C15.988 5.877 16.159 6.451 15.829 6.765L12.307 10.121L13.137 14.851C13.215 15.294 12.777 15.641 12.391 15.443L8 13.187L3.611 15.443H3.612Z" fill="var(--color-star)"/></svg>';
$stars = str_repeat($star_svg, 5);
?>

<!-- Hero -->
<section class="hero" style="background-image: url('/assets/images/hero.jpg')">
    <div class="container">
        <h1>Massagebehandling i Katrineholm för ett friskare du</h1>
        <p>Många av oss bär på mycket underliggande stress och spänningar. På CML Massage &amp; Wellness får du avkopplingen du längtar efter i en hemtrevlig miljö, så du kan bli mer produktiv och energifylld dagen ut.</p>
        <div class="hero-actions">
            <a href="/behandlingar.php" class="btn btn-primary">Se Behandlingar</a>
            <div class="hero-rating">
                <div class="stars"><?= $stars ?></div>
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
                <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48" fill="none"><g clip-path="url(#bc1)"><path d="M39.186 12.875C39.382 12.612 39.397 12.257 39.226 11.978C39.055 11.698 38.731 11.552 38.408 11.606C38.396 11.609 37.248 11.801 36.254 11.83C37.829 9.242 38.617 5.857 38.659 1.534C38.663 1.094 38.313 0.733 37.873 0.725C37.777 0.722 37.675 0.722 37.569 0.722C35.012 0.722 28.383 1.395 25.489 4.302C23.822 1.633 21.594 0.155 18.99 0.009C18.889 0.003 18.787 0 18.685 0C15.37 0 12.667 2.947 10.879 4.898C10.386 5.435 9.92 5.944 9.654 6.136C9.449 6.285 9.326 6.521 9.322 6.774C9.319 7.026 9.434 7.266 9.634 7.421C10.574 8.146 11.229 9.676 11.92 11.296C12.592 12.866 13.287 14.49 14.379 15.834C17.251 19.366 21.308 20.108 24.205 20.108C27.216 20.108 30.453 19.266 32.864 17.855C37.451 15.171 39.118 12.968 39.186 12.875ZM15.044 7.372C14.453 7.372 13.975 6.893 13.975 6.303C13.975 5.712 14.453 5.233 15.044 5.233C15.634 5.233 16.113 5.712 16.113 6.303C16.113 6.893 15.634 7.372 15.044 7.372Z" fill="var(--color-label)"/><path d="M20.057 39.614C19.848 39.103 19.614 38.597 19.361 38.109C17.709 34.917 15.439 32.786 13.244 30.725C12.626 30.145 11.838 29.237 11.004 28.275C9.786 26.872 8.526 25.421 7.68 24.868C6.914 24.367 6.287 24.353 5.818 24.827C5.133 25.518 5.335 26.806 6.472 29.003C7.232 30.472 8.334 32.201 9.501 34.032C9.689 34.326 9.879 34.626 10.071 34.927C8.004 32.667 6.486 30.612 5.553 28.808C4.48 26.737 4.262 25.136 4.939 24.301C5.417 23.712 6.326 23.566 7.499 23.889L7.673 23.937L7.631 23.761C7.61 23.67 5.441 14.637 4.983 12.928C4.882 12.551 4.742 12.187 4.566 11.848C3.935 10.627 2.937 9.887 2.193 10.086C1.834 10.183 1.243 10.591 1.32 12.243L2.45 26.503C2.507 26.968 2.548 27.456 2.591 27.973C2.723 29.552 2.859 31.186 3.506 32.435C3.775 32.955 4.086 33.424 4.458 33.87C5.128 34.672 6.991 36.61 8.963 38.662C10.882 40.659 12.867 42.724 13.592 43.586C14.161 44.263 14.653 45.009 15.097 45.867C15.455 46.558 15.755 47.271 16.023 48H22.961L22.857 47.646C22.023 44.813 21.107 42.186 20.057 39.614Z" fill="var(--color-label)"/><path d="M46.474 10.086C45.73 9.887 44.732 10.628 44.1 11.848C43.925 12.187 43.784 12.551 43.683 12.928C43.225 14.637 41.057 23.67 41.035 23.761L40.993 23.937L41.167 23.889C42.34 23.566 43.25 23.712 43.728 24.302C44.404 25.136 44.186 26.737 43.114 28.808C42.18 30.612 40.662 32.667 38.596 34.927C38.788 34.626 38.978 34.327 39.166 34.032C40.332 32.201 41.434 30.472 42.194 29.004C43.331 26.806 43.533 25.518 42.849 24.827C42.38 24.353 41.753 24.367 40.986 24.868C40.14 25.422 38.881 26.873 37.663 28.275C36.829 29.237 36.041 30.145 35.422 30.725C33.227 32.786 30.958 34.917 29.305 38.11C29.053 38.597 28.819 39.103 28.61 39.615C27.559 42.186 26.644 44.813 25.81 47.646L25.706 48H32.644C32.912 47.271 33.212 46.558 33.57 45.867C34.014 45.009 34.506 44.264 35.075 43.587C35.799 42.724 37.785 40.659 39.704 38.662C41.676 36.611 43.539 34.673 44.208 33.87C44.58 33.424 44.892 32.955 45.161 32.435C45.807 31.186 45.943 29.553 46.075 27.973C46.118 27.456 46.159 26.968 46.217 26.503L47.346 12.244C47.424 10.591 46.832 10.183 46.474 10.086Z" fill="var(--color-label)"/></g><defs><clipPath id="bc1"><rect width="48" height="48" fill="white" transform="translate(0.333)"/></clipPath></defs></svg>
                <h3>Balansera humöret</h3>
                <p>Finn ett gladare och mer balanserat humör dagen ut med mer energi.</p>
            </div>
            <div class="benefit-card">
                <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M27.638 2.491L22.313 5.66L23.044 6.894L26.344 4.93L25.388 11.063L25.978 12.056L31.5 8.768L30.769 7.534L27.272 9.609L28.219 3.48L27.638 2.491ZM13.791 5.677C10.524 7.494 7.802 10.15 5.905 13.372C4.008 16.593 3.005 20.262 3 24C3 29.57 5.212 34.911 9.151 38.849C13.089 42.788 18.431 45 24 45C28.541 44.998 32.958 43.524 36.59 40.799C40.223 38.075 42.874 34.246 44.147 29.888C42.328 31.814 40.135 33.35 37.703 34.401C35.271 35.452 32.65 35.996 30 36C24.828 36 19.868 33.946 16.211 30.289C12.555 26.632 10.5 21.672 10.5 16.5C10.503 12.646 11.648 8.88 13.791 5.677ZM36.713 10.556L36.066 12.103L40.2 13.828L33.797 17.194L33.281 18.431L40.191 21.319L40.838 19.772L36.459 17.944L42.863 14.578L43.378 13.341L36.713 10.556ZM25.931 16.556L16.763 19.838L17.522 21.966L23.203 19.931L19.884 29.109L20.494 30.806L30 27.413L29.241 25.284L23.222 27.441L26.541 18.263L25.931 16.556Z" fill="var(--color-label)"/></svg>
                <h3>Återställ dygnsrytmen</h3>
                <p>Få tillbaka din normala dygnsrytm och få den kvalitésömn du behöver.</p>
            </div>
            <div class="benefit-card">
                <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48" fill="none"><g clip-path="url(#bc3)"><path d="M24.667 8.842C16.296 8.842 9.509 15.629 9.509 24C9.509 32.371 16.296 39.158 24.667 39.158C33.039 39.158 39.825 32.371 39.825 24C39.825 15.629 33.039 8.842 24.667 8.842ZM24.667 30.316V25.895H19.615L24.667 17.684V22.105H29.72L24.667 30.316Z" fill="var(--color-label)"/><path d="M5.814 22.105H0.667V25.895H5.814C5.752 25.272 5.72 24.64 5.72 24C5.72 23.36 5.752 22.729 5.814 22.105Z" fill="var(--color-label)"/><path d="M22.773 0V5.147C23.396 5.085 24.028 5.053 24.667 5.053C25.307 5.053 25.939 5.085 26.562 5.147V0H22.773Z" fill="var(--color-label)"/><path d="M9.036 5.69L6.357 8.369L9.997 12.009C10.799 11.03 11.697 10.132 12.677 9.33L9.036 5.69Z" fill="var(--color-label)"/><path d="M40.298 5.69L36.658 9.33C37.638 10.132 38.535 11.03 39.337 12.009L42.977 8.369L40.298 5.69Z" fill="var(--color-label)"/><path d="M39.337 35.991C38.535 36.971 37.638 37.869 36.658 38.67L40.298 42.31L42.977 39.631L39.337 35.991Z" fill="var(--color-label)"/><path d="M43.521 22.105C43.582 22.729 43.615 23.361 43.615 24C43.615 24.64 43.582 25.272 43.521 25.895H48.667V22.105H43.521Z" fill="var(--color-label)"/><path d="M9.997 35.991L6.357 39.631L9.037 42.31L12.677 38.67C11.697 37.868 10.799 36.971 9.997 35.991Z" fill="var(--color-label)"/><path d="M24.667 42.947C24.028 42.947 23.396 42.915 22.773 42.853V48H26.562V42.853C25.939 42.915 25.307 42.947 24.667 42.947Z" fill="var(--color-label)"/></g><defs><clipPath id="bc3"><rect width="48" height="48" fill="white" transform="translate(0.667)"/></clipPath></defs></svg>
                <h3>Bli mer produktiv</h3>
                <p>Känn dig mer fokuserad på din arbetsplats och prestera bättre.</p>
            </div>
        </div>
    </div>
</section>

<!-- Treatment Preview -->
<section class="treatments">
    <div class="container">
        <div class="section-label">Vilken behandling längtar du efter?</div>
        <div class="section-header">
            <h2>Utforska CML Massage &amp; Wellness behandlingar</h2>
            <p>Här hittar du allt från Klassisk massage till spa-behandlingar. Om du har några frågor angående en behandling, tveka inte att kontakta mig.</p>
        </div>
        <div class="treatments-grid">
            <?php foreach ($preview as $service): ?>
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

<!-- Promo Banner Cards -->
<section class="promo-cards container">

    <!-- IR Bastu -->
    <div class="split-banner">
        <div class="split-banner-image">
            <img src="/assets/images/ir-bastu.jpg" alt="IR Bastu på CML Massage &amp; Wellness" width="600" height="453" loading="lazy">
        </div>
        <div class="split-banner-content">
            <h2>Välj gärna till IR Bastu till din massage!</h2>
            <p>Du kan numera välja till IR bastu till din favorit behandling! IR bastu har många fördelar och hjälper mig komma in djupare under massagens gång då det mjuknar upp kroppen.</p>
            <ul class="check-list">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                    Hjälper sänka blodtrycket
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                    Mjukar upp spända muskler
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                    Ökar kroppens förbränning
                </li>
            </ul>
            <div><a href="/behandlingar.php#ir-bastu-och-massage" class="btn btn-primary">Läs mer</a></div>
        </div>
    </div>

    <!-- Presentkort & Massagekort -->
    <div class="split-banner split-banner--reversed">
        <div class="split-banner-image">
            <img src="/assets/images/presentkort.png" alt="Presentkort och massagekort" width="1024" height="683" loading="lazy">
        </div>
        <div class="split-banner-content">
            <h2>Presentkort och massagekort</h2>
            <p>Upptäck den perfekta gåvan för välbefinnande med flexibla Presentkort. Presentkorten ger dig friheten att välja beloppet själv, funkar utmärkt som gåva för nära och kära.</p>
            <p>CML Massage &amp; Wellness erbjuder också massagekort med enkel och smidig checkout online där du kan betala med kort eller Klarna.</p>
            <div><a href="/presentkort-och-massagekort.php" class="btn btn-primary">Läs mer</a></div>
        </div>
    </div>

</section>

<!-- Friskvård Partners -->
<section class="partners">
    <div class="container">
        <h2><strong>Friskvårds samarbeten</strong></h2>
        <p>Du kan enkelt boka din massage genom Epassi, Benify eller Wellnet och också då betala med ditt friskvårds bidrag.</p>
        <div class="partner-logos">
            <img src="/assets/images/epassi.svg" alt="Epassi" width="160" height="70" loading="lazy">
            <img src="/assets/images/benify.svg" alt="Benify – Godkänd partner" width="110" height="110" loading="lazy">
            <img src="/assets/images/wellnet.svg" alt="Wellnet" width="160" height="70" loading="lazy">
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
            <div class="stars"><?= $stars ?></div>
            <span><strong><?= $salon['rating']['value'] ?> Fantastisk Bra</strong> (<?= $salon['rating']['count'] ?> betyg)</span>
        </div>
        <div class="reviews-scroll">
            <div class="review-card">
                <div class="stars"><?= $stars ?></div>
                <p class="review-title">Musklerna fick sig en skön och noggrann genomgång. Nancy är en mycket duktig massör!</p>
                <p class="review-text">Besöket hos Nancy gjorde mig så avslappnad och lugn. Musklerna fick sig en skön och noggrann genomgång. Nancy är en mycket duktig massör.</p>
                <p class="reviewer">Eleonor F.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars"><?= $stars ?></div>
                <p class="review-title">Min personliga favorit är Koppningen!</p>
                <p class="review-text">Jag har testat Aroma Thaimassage, Djupvävsmassage och Koppning. Alla 3 var riktigt bra men min personliga favorit är Koppningen. Nancy är väldigt professionell i sitt jobb. Rekommenderas!</p>
                <p class="reviewer">Sara S.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars"><?= $stars ?></div>
                <p class="review-title">Är själv certifierad massör och kräsen men det här är världsklass på flera nivåer!</p>
                <p class="review-text">Som alltid den bästa massagen ever … Så avslappnad, ompysslad och full av energi efteråt. Jag är själv certifierad massör och kräsen men det här är världsklass på flera nivåer med små detaljer som ger extra guldkant och gör att du som kund känner dig trygg hela vägen.</p>
                <p class="reviewer">Anki S.</p>
                <p class="reviewer-label">CML Massage &amp; Wellness Kund</p>
            </div>
            <div class="review-card">
                <div class="stars"><?= $stars ?></div>
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
