# Technical Specification & Agent Handoff: CML Massage & Wellness

**Target Agent:** Claude Code

**Project:** Production Rebuild & CMS Migration (WordPress $\to$ Vanilla PHP 8.x)

**Client:** CML Massage & Wellness (Katrineholm, Sweden)

**Live Domain:** `[https://www.cmlmassagewellness.se](https://www.cmlmassagewellness.se)`

**Hosting Environment:** one.com shared Linux server (PHP 8.x, Apache, SFTP)

**Deployment Pipeline:** Automated CI/CD via GitHub Actions (tested & green)

**Local Repository:** `~/fullstack/cml-massage-rebuild`

**Legacy WordPress Backup:** `~/Documents/cml_backup/www/`

## 1. Project Context & Objectives

The production site for CML Massage & Wellness previously ran on a compromised, unmaintained WordPress installation utilizing a pirated ("nulled") copy of the Bricks builder along with 13 active plugins. This architecture introduced significant security risks and severe performance degradation:

- **Performance Baseline:** 30/100 Lighthouse score, **18.1s Time to Interactive (TTI)**, **9.16s Largest Contentful Paint (LCP)**, and 2.35s Total Blocking Time (TBT).
    
- **The Business Milestone:** The salon is undergoing a physical re-opening in Katrineholm. The site must launch alongside this milestone.
    
- **Core Conversion Funnel:** The site is purely an informational and conversion engine. It directs visitors to book appointments via **Bokadirekt** while providing transparent information for Swedish corporate wellness systems (**Friskvård via Benify, Epassi**, and manual receipts).
    
- **Design Mandate:** Faithfully replicate the existing visual identity created by the client's family, but implement it using semantic HTML5 and clean CSS custom properties without page builders or front-end JS frameworks.
    

## 2. Completed Milestones & Infrastructure State

- [x] **Full Production Backup:** Complete WordPress installation backed up locally to `~/Documents/cml_backup/www/`. Salon images and media assets reside in `~/Documents/cml_backup/www/wp-content/uploads/`.
    
- [x] **Git Repository Initialized:** Local repository configured at `~/fullstack/cml-massage-rebuild`.
    
- [x] **CI/CD Pipeline Operational:** GitHub Actions workflow (`.github/workflows/deploy.yml`) is tested, verified, and running green.
    
    - Secrets configured: `SFTP_HOST`, `SFTP_USER`, `SFTP_PASSWORD`.
        
    - Transport: SFTP over port `22` to `ssh.cirq67giw.service.one`.
        
    - Absolute target directory: `/customers/f/3/b/cirq67giw/users/cirq67giw_ssh/webroots/www`.
        
    - **Critical Host Constraint:** one.com strictly enforces a single concurrent SFTP connection. The workflow enforces `concurrency: 1`.
        

## 3. Architecture & Technical Constraints

- **Runtime:** Vanilla PHP 8.x. No heavy frameworks (no Laravel, no WordPress, no Node.js runtime on production).
    
- **Data Storage (Flat-File Architecture):** Static data (treatments, durations, prices in SEK, contact details, opening hours) must live in clean PHP configs and JSON files under `src/data/`. Avoid database calls (zero MariaDB latency).
    
- **Public vs. Private Perimeter:** Apache maps requests to `/webroots/www`. Direct HTTP requests to `/src/` must be forbidden via `.htaccess` (`RewriteRule ^src/ - [F,L]`).
    
- **Security & Escaping:** Modern PHP 8 strict typing (`declare(strict_types=1);`). All user-facing output must pass through an explicit escaping helper (`e()`) wrapping `htmlspecialchars()`.
    
- **Zero Runtime Dependencies:** Zero client-side JS libraries (no jQuery, no React). Vanilla JS is restricted strictly to a lightweight mobile navigation toggle (<20 lines).
    
- **Performance Budget:** Sub-1s TTI, <0.8s LCP, 95+ Lighthouse score across Performance, Accessibility, Best Practices, and SEO.
    

## 4. Repository & File Contract

Claude Code must adhere to the following directory layout:

Plaintext

```
cml-massage-rebuild/
├── .github/
│   └── workflows/
│       └── deploy.yml              # CI/CD pipeline (ACTIVE - DO NOT OVERWRITE)
├── assets/
│   ├── css/
│   │   └── style.css               # Semantic CSS, CSS variables, mobile-first
│   ├── js/
│   │   └── main.js                 # Mobile drawer toggle only
│   └── images/                     # WebP optimized assets migrated from backup
├── src/
│   ├── data/
│   │   ├── salon.php               # Contact data, opening hours, Bokadirekt URL
│   │   └── services.json           # Catalog of massage treatments, durations, SEK prices
│   ├── helpers.php                 # e() escaping helper & booking URL generators
│   └── templates/
│       ├── header.php              # Meta, OpenGraph, JSON-LD Schema, responsive navbar
│       ├── footer.php              # Footer info, opening hours, map link, copyright
│       └── cta-booking.php         # Reusable conversion banner for Bokadirekt
├── .htaccess                       # Security rules (block /src/, enable gzip/caching)
├── index.php                       # Homepage (Hero, re-opening banner, service preview, reviews, map)
├── behandlingar.php                # Full treatment menu with direct deep links
├── friskvard.php                   # Benify, Epassi & wellness deduction guidelines
├── kontakt.php                     # Map embed/link, address, opening hours, contact details
└── README.md                       # Swedish portfolio case study
```

## 5. Core Implementation Details

### `src/helpers.php`

Must provide core utility functions:

PHP

```
<?php
declare(strict_types=1);

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

function get_booking_url(?string $service_id = null): string {
    $base = 'https://www.bokadirekt.se/places/...'; // From salon.php
    $utm = '?utm_source=cmlmassagewellness.se&utm_medium=website&utm_campaign=booking_cta';
    return $service_id ? $base . '/' . $service_id . $utm : $base . $utm;
}
```

### `src/data/services.json`

Structure treatments logically into categories:

JSON

```
[
  {
    "id": "klassisk-svensk-massage",
    "title": "Klassisk Svensk Massage",
    "description": "Djupgående eller avslappnande massage anpassad efter dina behov och muskelspänningar.",
    "options": [
      { "duration": "30 min", "price": 450 },
      { "duration": "60 min", "price": 750 },
      { "duration": "90 min", "price": 1050 }
    ],
    "bokadirekt_id": ""
  }
]
```

### Local SEO & Schema (`src/templates/header.php`)

Every page must render accurate JSON-LD schema for local visibility in Katrineholm:

- `@type`: `HealthAndBeautyBusiness` or `DaySpa`
    
- `name`: CML Massage & Wellness
    
- `address`: Valid Katrineholm street address, postal code, and Sweden country code
    
- `geo`: Lat/long coordinates
    
- `telephone`, `openingHours`, and `priceRange`
    

### Security (`.htaccess`)

Ensure Apache forbids browsing backend internals while allowing clean asset caching:

Apache

```
Options -Indexes

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^src/ - [F,L]
    RewriteRule ^\.git - [F,L]
</IfModule>

# Basic gzip compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/javascript application/json
</IfModule>
```

### Styling
Construct `assets/css/style.css` using clean, responsive CSS (Flexbox/Grid, CSS custom properties for brand colors and typography).

### Local verification
Ensure all code is verified with PHP's built-in server (`php -S localhost:8000`)

## 6. Execution Order Proposal
1. **Scaffold Core Data & Security:** Create `.htaccess`, `src/helpers.php`, `src/data/salon.php`, and `src/data/services.json`.
    
2. **Build Global Layout Templates:** Create `src/templates/header.php`, `src/templates/footer.php`, and `src/templates/cta-booking.php`.
    
3. **Asset Migration:** Inspect `~/Documents/cml_backup/www/wp-content/uploads/` to identify the salon logo, therapist certification images, and hero photos. Copy and convert key assets to WebP inside `assets/images/`.
    
4. **Develop Primary Pages:** Build `index.php`, `behandlingar.php`, `friskvard.php`, and `kontakt.php` consuming the flat data.



I'm also attaching screenshots of the live site for design specs.

Please reflect back your assessment and understanding of the project