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
            <a href="#behandlingar" class="btn btn-primary">Se Behandlingar</a>
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
<section class="treatments" id="behandlingar">
    <div class="container">
        <div class="section-label">Vilken behandling längtar du efter?</div>
        <div class="section-header">
            <h2>Utforska CML Massage &amp; Wellness behandlingar</h2>
            <p>Här hittar du allt från Klassisk massage till spa-behandlingar. Om du har några frågor angående en behandling, tveka inte att kontakta mig.</p>
        </div>
        <div class="treatments-grid">
            <?php foreach ($preview as $service): ?>
                <a id="<?= e($service['id']) ?>" href="/behandlingar/<?= e($service['id']) ?>" class="treatment-card" style="background-image: url('/assets/images/<?= e($service['image']) ?>')">
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
            <div><a href="/behandlingar/ir-bastu-och-massage" class="btn btn-primary">Läs mer</a></div>
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
<section class="about-nancy">
    <div class="about-nancy-image">
        <img src="/assets/images/nancy-lennartsson.png" alt="<?= e($salon['owner']) ?> framför CML Massage &amp; Wellness" width="1024" height="749" loading="lazy">
    </div>
    <div class="about-nancy-content">
        <h2>Din friskvårdsmassör i Katrineholm</h2>
        <p>Jag förstår hur det känns när ens kropp är överbelastad av stress och allt känns tungt, då vill man bara koppla av.</p>
        <p>Jag jobbar ständigt för att mina kunder ska kunna känna sig som hemma och få en toppenupplevelse.</p>
        <p>Här kan ni slappna av, lämna all stress, huvudvärk och fysisk oro som manifesteras i kroppen som bara tynger ner en.</p>
        <a href="/om-foretaget.php" class="btn btn-primary">Läs mer</a>
    </div>
</section>

<!-- How to Book -->
<section class="steps">
    <div class="container">
        <h2>Hur du bokar din behandling</h2>
        <p>Du bokar snabbt och enkelt genom bokadirekt. Har du några frågor angående bokning, hör gärna av dig!</p>
        <div class="steps-grid">
            <div class="step-card">
                <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 49 48" fill="none"><path d="M10.8335 9C10.8335 4.8645 14.198 1.5 18.3335 1.5C22.469 1.5 25.8335 4.8645 25.8335 9C25.8335 11.4405 24.644 13.5915 22.8335 14.961V9C22.8335 6.519 20.8145 4.5 18.3335 4.5C15.8525 4.5 13.8335 6.519 13.8335 9V14.961C12.023 13.5915 10.8335 11.4405 10.8335 9ZM36.3335 19.5C34.6775 19.5 33.3335 20.844 33.3335 22.5V21C33.3335 19.344 31.9895 18 30.3335 18C28.6775 18 27.3335 19.344 27.3335 21V19.5C27.3335 17.844 25.9895 16.5 24.3335 16.5C22.6775 16.5 21.3335 17.844 21.3335 19.5V9C21.3335 7.344 19.9895 6 18.3335 6C16.6775 6 15.3335 7.344 15.3335 9V24.4155C14.891 24.159 14.3825 24 13.8335 24C12.1775 24 10.8335 25.344 10.8335 27V31.5C10.8335 32.181 11.066 32.8425 11.4905 33.3735L16.8335 42H34.8335L38.273 37.0605C38.8565 36.477 39.3335 35.325 39.3335 34.5V22.5C39.3335 20.844 37.9895 19.5 36.3335 19.5ZM16.8335 43.5V45C16.8335 45.828 17.504 46.5 18.3335 46.5H33.3335C34.163 46.5 34.8335 45.828 34.8335 45V43.5H16.8335Z" fill="var(--color-label)"/></svg>
                <h3>Välj din behandling</h3>
                <p>Välj massagebehandling och hur länge du vill ha den.</p>
            </div>
            <div class="step-card">
                <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M7.5 42H41.5815C41.0595 42.891 40.1025 43.5 39 43.5H7.5C4.2 43.5 1.5 40.8 1.5 37.5V13.5C1.5 12.3975 2.109 11.4405 3 10.9185V37.5C3 39.981 5.019 42 7.5 42ZM30 10.5C30.8295 10.5 31.5 9.828 31.5 9V4.5C31.5 3.672 30.8295 3 30 3C29.1705 3 28.5 3.672 28.5 4.5V9C28.5 9.828 29.1705 10.5 30 10.5ZM39 10.5C39.8295 10.5 40.5 9.828 40.5 9V4.5C40.5 3.672 39.8295 3 39 3C38.1705 3 37.5 3.672 37.5 4.5V9C37.5 9.828 38.1705 10.5 39 10.5ZM21 10.5C21.8295 10.5 22.5 9.828 22.5 9V4.5C22.5 3.672 21.8295 3 21 3C20.1705 3 19.5 3.672 19.5 4.5V9C19.5 9.828 20.1705 10.5 21 10.5ZM12 10.5C12.8295 10.5 13.5 9.828 13.5 9V4.5C13.5 3.672 12.8295 3 12 3C11.1705 3 10.5 3.672 10.5 4.5V9C10.5 9.828 11.1705 10.5 12 10.5ZM46.5 9V37.5C46.5 39.15 45.15 40.5 43.5 40.5H7.5C5.85 40.5 4.5 39.15 4.5 37.5V9C4.5 7.35 5.85 6 7.5 6H9V9C9 10.6545 10.3455 12 12 12C13.6545 12 15 10.6545 15 9V6H18V9C18 10.6545 19.3455 12 21 12C22.6545 12 24 10.6545 24 9V6H27V9C27 10.6545 28.3455 12 30 12C31.6545 12 33 10.6545 33 9V6H36V9C36 10.6545 37.3455 12 39 12C40.6545 12 42 10.6545 42 9V6H43.5C45.15 6 46.5 7.35 46.5 9ZM20.2545 30C20.7645 29.3565 21.4515 28.6695 22.0605 28.0605C23.751 26.37 25.5 24.621 25.5 22.5C25.5 19.1985 22.809 18 21 18C19.191 18 16.5 19.1985 16.5 22.5C16.5 23.328 17.172 24 18 24C18.828 24 19.5 23.328 19.5 22.5C19.5 21.2925 20.325 21.018 20.982 21C21.675 21.018 22.5 21.2925 22.5 22.5C22.5 23.379 21.0795 24.798 19.9395 25.9395C18.249 27.63 16.5 29.379 16.5 31.5C16.5 32.328 17.172 33 18 33H24C24.828 33 25.5 32.328 25.5 31.5C25.5 30.672 24.828 30 24 30H20.2545ZM34.83 25.5C35.55 24.702 36 23.6565 36 22.5C36 20.019 33.981 18 31.5 18C29.019 18 27 20.019 27 22.5C27 23.328 27.672 24 28.5 24C29.328 24 30 23.328 30 22.5C30 21.6735 30.6735 21 31.5 21C32.3265 21 33 21.6735 33 22.5C33 23.3265 32.3265 24 31.5 24C31.365 24 31.287 24.0225 31.2285 24.054C30.5355 24.186 30 24.768 30 25.5C30 26.235 30.5385 26.817 31.2345 26.946C31.293 26.9775 31.371 27 31.5 27C32.3265 27 33 27.6735 33 28.5C33 29.3265 32.3265 30 31.5 30C30.6735 30 30 29.3265 30 28.5C30 27.672 29.328 27 28.5 27C27.672 27 27 27.672 27 28.5C27 30.981 29.019 33 31.5 33C33.981 33 36 30.981 36 28.5C36 27.3435 35.5485 26.298 34.83 25.5Z" fill="var(--color-label)"/></svg>
                <h3>Utse bästa tiden</h3>
                <p>Välj tid och datum genom bokningsportalen.</p>
            </div>
            <div class="step-card">
                <svg class="step-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 49 48" fill="none"><path d="M24.667 1.5C12.241 1.5 2.16699 11.574 2.16699 24C2.16699 36.426 12.241 46.5 24.667 46.5C37.093 46.5 47.167 36.426 47.167 24C47.167 11.574 37.093 1.5 24.667 1.5ZM39.505 13.701C40.222 13.287 41.14 13.533 41.554 14.25C41.968 14.967 41.722 15.885 41.005 16.299C40.288 16.713 39.37 16.467 38.956 15.75C38.542 15.033 38.788 14.115 39.505 13.701ZM32.368 7.662C32.782 6.945 33.7 6.699 34.417 7.113C35.134 7.527 35.38 8.445 34.966 9.162C34.552 9.879 33.634 10.125 32.917 9.711C32.2 9.297 31.954 8.379 32.368 7.662ZM5.16699 24C5.16699 23.172 5.83899 22.5 6.66699 22.5C7.49499 22.5 8.16699 23.172 8.16699 24C8.16699 24.828 7.49499 25.5 6.66699 25.5C5.83899 25.5 5.16699 24.828 5.16699 24ZM9.82899 34.299C9.11199 34.713 8.19399 34.467 7.77999 33.75C7.36599 33.033 7.61199 32.115 8.32899 31.701C9.04599 31.287 9.96399 31.533 10.378 32.25C10.792 32.967 10.546 33.885 9.82899 34.299ZM10.378 15.75C9.96399 16.467 9.04599 16.713 8.32899 16.299C7.61049 15.885 7.36599 14.967 7.77999 14.25C8.19399 13.533 9.11199 13.287 9.82899 13.701C10.546 14.115 10.792 15.033 10.378 15.75ZM16.966 40.338C16.552 41.055 15.634 41.301 14.917 40.887C14.2 40.473 13.954 39.555 14.368 38.838C14.782 38.121 15.7 37.875 16.417 38.289C17.134 38.703 17.38 39.621 16.966 40.338ZM16.417 9.711C15.7 10.125 14.782 9.879 14.368 9.162C13.954 8.4435 14.2 7.527 14.917 7.113C15.634 6.699 16.552 6.945 16.966 7.662C17.38 8.379 17.134 9.297 16.417 9.711ZM24.667 43.5C23.839 43.5 23.167 42.828 23.167 42C23.167 41.172 23.839 40.5 24.667 40.5C25.495 40.5 26.167 41.172 26.167 42C26.167 42.828 25.495 43.5 24.667 43.5ZM34.417 40.887C33.7 41.301 32.782 41.055 32.368 40.338C31.954 39.621 32.2 38.703 32.917 38.289C33.634 37.875 34.552 38.121 34.966 38.838C35.38 39.5565 35.134 40.473 34.417 40.887ZM36.469 30.744C36.058 31.4625 35.1415 31.713 34.423 31.302L23.923 25.302C23.455 25.035 23.167 24.5385 23.167 24V6C23.167 5.172 23.839 4.5 24.667 4.5C25.495 4.5 26.167 5.172 26.167 6V23.13L35.911 28.698C36.631 29.109 36.88 30.0255 36.469 30.744ZM41.554 33.75C41.14 34.467 40.222 34.713 39.505 34.299C38.788 33.885 38.542 32.967 38.956 32.25C39.37 31.533 40.288 31.287 41.005 31.701C41.7235 32.115 41.968 33.033 41.554 33.75ZM42.667 25.5C41.839 25.5 41.167 24.828 41.167 24C41.167 23.172 41.839 22.5 42.667 22.5C43.495 22.5 44.167 23.172 44.167 24C44.167 24.828 43.495 25.5 42.667 25.5Z" fill="var(--color-label)"/></svg>
                <h3>Betala i lugn och ro</h3>
                <p>Betala genom Swish, kort, Klarna eller på salongen.</p>
            </div>
        </div>
    </div>
</section>

<!-- Reviews -->
<?php $reviews = get_reviews(); ?>
<section class="reviews">
    <div class="reviews-header">
        <div class="section-label">Vad säger kunderna?</div>
        <h2 class="reviews-heading">CML Massage &amp; Wellness är älskat av hundratals personer i Katrineholm</h2>
        <div class="reviews-rating">
            <div class="stars"><?= $stars ?></div>
            <span><strong><?= $salon['rating']['value'] ?> Fantastisk Bra</strong> (<?= $salon['rating']['count'] ?> betyg)</span>
        </div>
    </div>
    <div class="reviews-carousel" data-total="<?= count($reviews) ?>">
        <div class="reviews-track">
            <?php foreach ($reviews as $review): ?>
            <div class="review-card">
                <div class="stars"><?= $stars ?></div>
                <p class="review-title"><?= e($review['heading']) ?></p>
                <p class="review-text"><?= e($review['quote']) ?></p>
                <div class="review-footer">
                    <p class="reviewer"><?= e($review['name']) ?></p>
                    <p class="reviewer-label"><?= e($review['status']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="reviews-controls">
        <div class="reviews-progress">
            <div class="reviews-progress-bar"></div>
        </div>
        <div class="reviews-nav">
            <button class="reviews-nav-btn reviews-prev" aria-label="Föregående recension">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            </button>
            <button class="reviews-nav-btn reviews-next" aria-label="Nästa recension">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- CTA -->
<?php require __DIR__ . '/src/templates/cta-booking.php'; ?>

<!-- Contact -->
<section class="bg-light contact-section" id="kontakt">
    <div class="container">
        <div class="section-label">Funderar du över något?</div>
        <div class="contact-grid">
            <div class="contact-form-wrap">
                <?php if (isset($_GET['msg'])): ?>
                    <div class="form-alert form-alert--<?= $_GET['msg'] === 'ok' ? 'success' : 'error' ?>">
                        <?= $_GET['msg'] === 'ok'
                            ? 'Tack för ditt meddelande! Jag återkommer så snart jag kan.'
                            : e($_GET['error'] ?? 'Något gick fel. Försök igen.') ?>
                    </div>
                <?php endif; ?>
                <form action="/src/handle-contact.php" method="post" class="contact-form" novalidate>
                    <div class="form-row">
                        <input type="text" name="first_name" placeholder="Ditt Förnamn" required>
                        <input type="text" name="last_name" placeholder="Ditt Efternamn" required>
                    </div>
                    <input type="email" name="email" placeholder="Din E-post" required>
                    <input type="tel" name="phone" placeholder="Ditt Telefonnummer">
                    <textarea name="message" placeholder="Ditt Meddelande" rows="6" required></textarea>
                    <div class="form-counter"><span class="char-count">0</span> karaktärer / <span class="word-count">0</span> ord</div>
                    <label for="website" class="honeypot">Webbplats</label>
                    <input type="text" name="website" id="website" class="honeypot" tabindex="-1" autocomplete="off">
                    <button type="submit" class="btn btn-submit">Skicka</button>
                </form>
            </div>
            <div class="contact-info">
                <h2>Kontakta mig</h2>
                <p>Använd gärna kontakt formuläret vid frågor. Om det är brådskande kan jag nås på numret under. Svarar jag inte är jag förmodligen med en kund men ringer tillbaka till dig så snabbt jag kan!</p>
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
