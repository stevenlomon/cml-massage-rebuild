<?php
declare(strict_types=1);
$page_title = 'Friskvård – CML Massage & Wellness | Epassi, Benify, Wellnet';
$page_description = 'Använd ditt friskvårdsbidrag för massage hos CML Massage & Wellness i Katrineholm. Godkänd friskvårdsmassör och partner hos Epassi, Benify och Wellnet.';
require_once __DIR__ . '/src/templates/header.php';
$salon = get_salon_data();
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="section-label">Friskvård</div>
        <h1>Använd ditt friskvårdsbidrag för massage</h1>
        <p>CML Massage &amp; Wellness är godkänd friskvårdsmassör. Betala enkelt med ditt friskvårdsbidrag via Epassi, Benify eller Wellnet.</p>
    </div>
</section>

<!-- What is Friskvård -->
<section style="padding: 4rem 0;">
    <div class="container">
        <div class="section-header">
            <div>
                <div class="section-label">Friskvårdsbidraget</div>
                <h2>Vad är friskvårdsbidrag?</h2>
            </div>
            <p>Friskvårdsbidraget är en skattefri förmån som din arbetsgivare kan erbjuda för att främja din hälsa och ditt välmående. Massage är en av de mest populära och godkända friskvårdsaktiviteterna.</p>
        </div>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 2L6 10v12c0 11.1 7.7 21.5 18 24 10.3-2.5 18-12.9 18-24V10L24 2zm-4 32l-8-8 2.8-2.8L20 28.4l13.2-13.2L36 18 20 34z"/></svg>
                </div>
                <h3>Skattefri förmån</h3>
                <p>Din arbetsgivare kan erbjuda friskvårdsbidrag som en skattefri förmån enligt Skatteverkets riktlinjer.</p>
            </div>
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-2.2 0-4 1.8-4 4v2c-3.3 1.5-6 4.5-6 8.5 0 3 1.5 5.5 3.5 7.5l-5 5c-.8.8-.8 2 0 2.8L16 37.3c.8.8 2 .8 2.8 0l5-5c.7.1 1.4.2 2.2.2h-2c.8 0 1.5-.1 2.2-.2l5 5c.8.8 2 .8 2.8 0l3.5-3.5c.8-.8.8-2 0-2.8l-5-5c2-2 3.5-4.5 3.5-7.5 0-4-2.7-7-6-8.5V8c0-2.2-1.8-4-4-4z"/></svg>
                </div>
                <h3>Massage är godkänt</h3>
                <p>Massage räknas som en godkänd friskvårdsaktivitet. Perfekt för att minska stress och spänningar.</p>
            </div>
            <div class="benefit-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M30 10H18c-1.1 0-2 .9-2 2v24c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V12c0-1.1-.9-2-2-2zm-6 26c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-6H18V14h12v16z"/></svg>
                </div>
                <h3>Enkelt att använda</h3>
                <p>Betala direkt via Epassi, Benify eller Wellnet. Inga krångliga blanketter eller utlägg.</p>
            </div>
        </div>
    </div>
</section>

<!-- Partners -->
<section class="bg-light" style="padding: 4rem 0;">
    <div class="container">
        <div class="section-label">Våra samarbetspartners</div>
        <h2 style="margin-bottom: 0.75rem;">Boka och betala med friskvårdsbidrag</h2>
        <p style="max-width: 600px; font-size: 0.95rem; opacity: 0.85; margin-bottom: 2rem;">Vi samarbetar med de tre största friskvårdsplattformarna i Sverige så att du smidigt kan använda ditt bidrag.</p>
        <div class="partner-cards">
            <div class="partner-card">
                <img src="/assets/images/epassi.svg" alt="Epassi" width="120" height="60" loading="lazy">
                <h3>Epassi</h3>
                <p>Boka via Epassi-appen eller webbportalen och betala direkt med ditt friskvårdsbidrag. Sök efter CML Massage &amp; Wellness i appen för att hitta oss.</p>
            </div>
            <div class="partner-card">
                <img src="/assets/images/benify.svg" alt="Benify – Godkänd partner" width="80" height="80" loading="lazy">
                <h3>Benify</h3>
                <p>Har din arbetsgivare Benify? Logga in på Benify-portalen och hitta CML Massage &amp; Wellness bland godkända friskvårdsleverantörer.</p>
            </div>
            <div class="partner-card">
                <img src="/assets/images/wellnet.svg" alt="Wellnet" width="120" height="60" loading="lazy">
                <h3>Wellnet</h3>
                <p>Betala med ditt Wellnet-kort eller QR-kod direkt i salongen. Snabbt, enkelt och utan krångel.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="steps">
    <div class="container">
        <h2>Så enkelt bokar du med friskvård</h2>
        <p>Tre enkla steg för att använda ditt friskvårdsbidrag hos oss.</p>
        <div class="steps-grid">
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M40 8H8c-2.2 0-4 1.8-4 4v24c0 2.2 1.8 4 4 4h32c2.2 0 4-1.8 4-4V12c0-2.2-1.8-4-4-4zm0 8L24 26 8 16v-4l16 10 16-10v4z"/></svg>
                </div>
                <h3>Kolla med din arbetsgivare</h3>
                <p>Kontrollera att du har friskvårdsbidrag och vilken plattform din arbetsgivare använder.</p>
            </div>
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M34 22H26V14h-4v8H14v4h8v8h4v-8h8z M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm0 36c-8.84 0-16-7.16-16-16S15.16 8 24 8s16 7.16 16 16-7.16 16-16 16z"/></svg>
                </div>
                <h3>Boka din behandling</h3>
                <p>Välj en behandling och boka en tid som passar dig via Bokadirekt.</p>
            </div>
            <div class="step-card">
                <div class="icon">
                    <svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 2L6 10v12c0 11.1 7.7 21.5 18 24 10.3-2.5 18-12.9 18-24V10L24 2zm-4 32l-8-8 2.8-2.8L20 28.4l13.2-13.2L36 18 20 34z"/></svg>
                </div>
                <h3>Betala med friskvård</h3>
                <p>Betala smidigt via Epassi, Benify eller Wellnet direkt i salongen eller vid bokning.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<?php
$cta_heading = 'Redo att boka med friskvårdsbidrag?';
$cta_text = 'Boka din massage idag och betala enkelt med ditt friskvårdsbidrag. Du förtjänar att ta hand om dig själv.';
$cta_button_text = 'Boka Nu';
$cta_button_url = get_booking_url();
require __DIR__ . '/src/templates/cta-booking.php';
?>

<?php require __DIR__ . '/src/templates/footer.php'; ?>
