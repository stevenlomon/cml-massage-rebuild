<?php
declare(strict_types=1);
require_once __DIR__ . '/../helpers.php';
$salon = get_salon_data();
$page = get_current_page();
$page_title = $page_title ?? e($salon['meta']['title']);
$page_description = $page_description ?? e($salon['meta']['description']);
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <meta name="description" content="<?= $page_description ?>">

    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;600;700&family=Source+Serif+4:wght@600&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= $page_title ?>">
    <meta property="og:description" content="<?= $page_description ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($salon['website']) ?>">
    <meta property="og:locale" content="sv_SE">
    <meta property="og:site_name" content="<?= e($salon['name']) ?>">

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "HealthAndBeautyBusiness",
        "name": "<?= e($salon['name']) ?>",
        "url": "<?= e($salon['website']) ?>",
        "telephone": "<?= e($salon['phone']) ?>",
        "email": "<?= e($salon['email']) ?>",
        "priceRange": "<?= e($salon['price_range']) ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?= e($salon['address']['street']) ?>",
            "postalCode": "<?= e($salon['address']['postal']) ?>",
            "addressLocality": "<?= e($salon['address']['city']) ?>",
            "addressCountry": "<?= e($salon['address']['country']) ?>"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": <?= $salon['geo']['lat'] ?>,
            "longitude": <?= $salon['geo']['lng'] ?>
        },
        "openingHours": "<?= e($salon['opening_hours_schema']) ?>",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?= $salon['rating']['value'] ?>",
            "reviewCount": "<?= $salon['rating']['count'] ?>"
        }
    }
    </script>
</head>
<body>
    <a href="#main" class="skip-link">Hoppa till innehåll</a>

    <header class="site-header">
        <div class="container header-inner">
            <a href="/" class="logo" aria-label="<?= e($salon['name']) ?> – Startsida">
                <img src="/assets/images/logo.png" alt="<?= e($salon['name']) ?>" width="50" height="50">
            </a>

            <button class="nav-toggle" aria-expanded="false" aria-controls="main-nav" aria-label="Meny">
                <span class="hamburger"></span>
            </button>

            <nav id="main-nav" class="main-nav" aria-label="Huvudmeny">
                <ul>
                    <li><a href="/"<?= is_active_page('index') ? ' aria-current="page"' : '' ?>>Hem</a></li>
                    <li><a href="/behandlingar.php"<?= is_active_page('behandlingar') ? ' aria-current="page"' : '' ?>>Behandlingar</a></li>
                    <li><a href="/friskvard.php"<?= is_active_page('friskvard') ? ' aria-current="page"' : '' ?>>Friskvård</a></li>
                    <li><a href="/kontakt.php"<?= is_active_page('kontakt') ? ' aria-current="page"' : '' ?>>Kontakt</a></li>
                    <li><a href="<?= e(get_booking_url()) ?>" class="btn btn-nav" target="_blank" rel="noopener">Boka Nu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main">
