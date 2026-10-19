# CML Massage & Wellness — Technical Handoff

**Date:** 2026-10-19
**Branch:** `dev` (all work so far is here, not yet merged to `main`)
**Repo:** `stevenlomon/cml-massage-rebuild`

---

## 1. What This Project Is

A ground-up rebuild of the production website for **CML Massage & Wellness**, a massage salon in Katrineholm, Sweden, owned by Nancy Lennartsson. The previous site was a WordPress installation using a pirated Bricks builder theme with 13 plugins — it scored 30/100 on Lighthouse and was a security liability. The rebuild targets **sub-1s TTI**, **95+ Lighthouse**, and faithful replication of the existing visual identity.

The salon is physically re-opening and the site must launch alongside. The primary conversion funnel directs visitors to **Bokadirekt** for bookings, with Friskvård info (Benify, Epassi, Wellnet) for Swedish corporate wellness benefits.

---

## 2. Architecture Constraints (Non-Negotiable)

- **Vanilla PHP 8.x** with `declare(strict_types=1)` in every file
- **Flat-file architecture** — no database, no ORM, no framework
- **All output escaped** via the `e()` helper — never echo raw user-facing data
- **Zero JS frameworks** — the only JS is an 11-line mobile nav toggle
- **K&R brace style** (same-line opening braces) — the user's explicit preference
- **Nullable types with `??`** — e.g., `e(?string $value)` with `$value ?? ''`
- **String interpolation** preferred over concatenation
- **No comments** unless the WHY is non-obvious
- **Google Fonts:** Source Serif 4 (hero headings), Source Sans 3 (everything else)
- **Mobile-first CSS** with Flexbox/Grid, responsive breakpoint at 768px

---

## 3. Deployment Pipeline

**DO NOT MODIFY `.github/workflows/deploy.yml`** — the user manages this themselves.

- **Host:** one.com shared hosting (SFTP only, no SSH shell)
- **CI/CD:** GitHub Actions triggers on push to `main` (not `dev`)
- **Mechanism:** `wangyucode/sftp-upload-action@v3`
- **Server:** `ssh.cirq67giw.service.one`, port 22
- **Remote path:** `/customers/f/3/b/cirq67giw/users/cirq67giw_ssh/webroots/www`
- **Concurrency:** 1 (one.com limitation)
- **Excludes from deploy:** `.git*`, `.github/**`, `README.md`, `docs/**`
- **paths-ignore in trigger:** `README.md`, `.gitignore`, `docs/**`, `assets/**`
- **Note:** `assets/**` is in `paths-ignore` (won't trigger deploy) but is NOT in the SFTP exclude list (will be uploaded when other files trigger a deploy). This is intentional — assets deploy alongside code changes, not on their own.

**To deploy:** merge `dev` into `main` and push. The workflow handles the rest.

---

## 4. File Tree (Complete)

```
cml-massage-rebuild/
├── .claude/
│   └── launch.json                 # Dev server: php -S localhost:8000
├── .github/
│   └── workflows/
│       └── deploy.yml              # CI/CD pipeline (DO NOT MODIFY)
├── .htaccess                       # Apache security + performance rules
├── index.php                       # Homepage (12 sections, complete)
├── assets/
│   ├── css/
│   │   └── style.css               # Complete CSS (~885 lines) with brand tokens
│   ├── js/
│   │   └── main.js                 # Mobile nav toggle (11 lines)
│   └── images/                     # 21 images from WordPress backup
│       ├── logo.png
│       ├── favicon.png
│       ├── hero.jpg
│       ├── svensk-klassisk-massage.jpg
│       ├── head-neck-shoulders.jpg
│       ├── djupvavnadsmassage.jpg
│       ├── lymfmassage.jpg
│       ├── koppning.jpg
│       ├── taktil-massage.jpg
│       ├── hot-stone-massage.jpg
│       ├── body-clay-wrapping-relax.jpg
│       ├── aroma-scrub-massage.jpg
│       ├── top-to-toe-deluxe-detox.jpg
│       ├── ir-bastu.jpg
│       ├── salongen.jpg
│       ├── nancy-lennartsson.jpg
│       ├── epassi.svg
│       ├── benify.svg
│       ├── wellnet.svg
│       ├── kvalitets-sakrad.png
│       └── kroppsterapeuternas-yrkesforband.png
├── src/
│   ├── helpers.php                 # Core utility functions (escape, data loaders, etc.)
│   ├── data/
│   │   ├── salon.php               # Salon config (associative array)
│   │   └── services.json           # Treatment catalog (11 services, real pricing)
│   └── templates/
│       ├── header.php              # HTML head + sticky nav + JSON-LD schema
│       ├── footer.php              # 3-column footer + trust badges + social links
│       └── cta-booking.php         # Reusable CTA split-banner
├── docs/
│   └── HANDOFF.md                  # This file
└── README.md                       # Project README (pre-existing)
```

---

## 5. Data Layer Details

### `src/helpers.php` — Core Functions

| Function | Purpose |
|----------|---------|
| `e(?string $value): string` | XSS-safe HTML escaping. Uses `ENT_QUOTES \| ENT_HTML5`. Accepts nullable strings with `?? ''` fallback. **All user-facing output must go through this.** |
| `get_salon_data(): array` | Loads `salon.php` config with `static` memoization (one disk read per request). |
| `get_services(): array` | Loads `services.json` with `static` memoization. Uses `JSON_THROW_ON_ERROR`. |
| `get_booking_url(?string $service_id = null): string` | Builds Bokadirekt URL with UTM params. Pass a service ID for deep linking. |
| `get_current_page(): string` | Returns current page slug from `$_SERVER['SCRIPT_NAME']` (e.g., `'index'`, `'behandlingar'`). |
| `is_active_page(string $page): bool` | For `aria-current="page"` nav highlighting. |

### `src/data/salon.php` — Salon Configuration

A `return [...]` associative array. Key fields:
- **Business:** name, legal_name, owner (Nancy Lennartsson), phone (0707811007), email
- **Address:** Tallbacken 26, 64151 Katrineholm
- **Geo:** lat 58.9957, lng 16.2080
- **Bokadirekt URL:** `https://www.bokadirekt.se/places/cml-massage-wellness-katrineholm-33316`
- **Opening hours:** Mon–Sun 13:30–21:00 (Swedish day names as keys)
- **Rating:** 4.9 / 1787 reviews (has a `TODO` comment about auto-updating)
- **Social:** Facebook + Google links
- **Meta:** Default page title and description for SEO

### `src/data/services.json` — Treatment Catalog

JSON array of 11 treatment objects. Each has:
- `id` (slug, used as anchor and for Bokadirekt deep links)
- `title`, `description`, `long_description`
- `benefits` (array of 3 strings)
- `options` (array of `{label?, duration, price}` objects)
- `image` (filename in `assets/images/`)
- `featured` (boolean — first 4 are `true`, shown on homepage)

**Treatments and pricing (from the live site as of 2026-09):**

| Treatment | Price Range | Featured |
|-----------|------------|----------|
| Svensk Klassisk Massage | 785–1177 kr | Yes |
| Head, Neck & Shoulders | 785 kr | Yes |
| Djupvävnadsmassage | 869–1177 kr | Yes |
| Lymfmassage | 1177–1245 kr | Yes |
| Koppning | 785–1177 kr | No |
| Taktil Massage | 785–1177 kr | No |
| Hot Stone Massage | 800–1177 kr | No |
| Body Clay Wrapping Relax | 2300 kr | No |
| Aroma Scrub Massage | 1177 kr (2 scent variants) | No |
| Top to Toe Deluxe Detox | 2300 kr | No |
| IR Bastu och Massage | 1000–1245 kr (4 combos) | No |

---

## 6. Template System

Every page follows this pattern:
```php
<?php
declare(strict_types=1);
require_once __DIR__ . '/src/templates/header.php';
// ... page content ...
<?php require __DIR__ . '/src/templates/footer.php'; ?>
```

### `header.php`
- Includes `helpers.php` and loads salon data
- Accepts optional `$page_title` and `$page_description` overrides (defaults from `salon.php` meta)
- Outputs: `<!DOCTYPE html>`, charset, viewport, title, description meta, Google Fonts preconnect, stylesheet link, favicon, Open Graph tags, JSON-LD `HealthAndBeautyBusiness` schema
- Skip-link for accessibility
- Sticky header with logo, hamburger toggle, nav links (Hem, Behandlingar, Friskvård, Kontakt, Boka Nu CTA)
- `aria-current="page"` on active nav link via `is_active_page()`
- Opens `<main id="main">`

### `footer.php`
- Closes `</main>`
- Three-column grid: Företag (company address/contact), Behandlingar (auto-generated from `services.json`), Öppetider (auto-generated from `salon.php`)
- Trust badges: CML logo, Kvalitetssäkrad, Kroppsterapeuternas Yrkesförbund
- Social links (Facebook, Google) with inline SVG icons
- Dynamic copyright year: `date('Y')`
- Loads `main.js` with `defer`

### `cta-booking.php`
- Reusable split-layout CTA banner
- Accepts PHP variable overrides: `$cta_heading`, `$cta_text`, `$cta_button_text`, `$cta_button_url`
- Defaults to "Hur kan du uppleva ett friskare du?" content with link to `/behandlingar.php`
- Uses `salongen.jpg` as the image half

---

## 7. CSS Design System

**File:** `assets/css/style.css` (~885 lines)

### Brand Tokens (extracted from the live WordPress site)
```css
--color-primary: #113f53     /* Deep teal — headings, text, dark backgrounds */
--color-accent: #10bbd3      /* Bright cyan — CTAs, links, active states */
--color-accent-hover: #0ea8be
--color-label: #005c88        /* Section labels */
--color-bg: #fbfbff           /* Page background (near-white with blue tint) */
--color-bg-light: #e8ecfc     /* Section backgrounds (reviews, contact) */
--color-bg-card: #ffffff      /* Card backgrounds */
--color-text: #113f53         /* Same as primary */
--color-text-light: #fbfbff   /* Text on dark backgrounds */
--color-star: #ffd64f         /* Rating stars */
--color-check: #10bbd3        /* Checkmark badges */
```

### Typography
- Body: `Source Sans 3` (400, 600, 700)
- Headings: `Source Serif 4` (600) — used only on `h1`
- `h1`: `clamp(2rem, 5vw, 3.4rem)`
- `h2`: `clamp(1.5rem, 3.5vw, 2.55rem)`
- `h3`: `clamp(1.2rem, 2.5vw, 1.9rem)`

### Key Component Classes
- `.container` — max-width 1200px centered wrapper
- `.btn`, `.btn-primary`, `.btn-nav` — pill-shaped buttons with hover lift
- `.section-label` — uppercase label with trailing line
- `.hero` — full-width background image with gradient overlay
- `.benefit-card`, `.step-card` — centered icon cards with shadow
- `.treatment-card` — background-image card with bottom gradient text overlay
- `.split-banner` — 50/50 image + dark content grid
- `.cta-card` — same as split-banner but for CTA sections
- `.reviews-scroll` — horizontal scroll container with snap
- `.review-card` — fixed-width (320px) review card
- `.partner-logos` — flex row of partner images
- `.footer-grid` — 3-column (1fr 2fr 1fr) footer layout
- `.bg-light` — light background variant

### Responsive
Single breakpoint at **768px**. Below it:
- Hamburger menu appears, nav stacks vertically
- All grids collapse to single column
- Split banners stack (image on top, capped at 300px)
- Hero min-height drops to 60vh
- Footer treatments go single-column

---

## 8. Homepage Structure (`index.php`)

The homepage has 12 sections, matching the live WordPress site exactly:

1. **Hero** — Background image with gradient overlay, heading "Massagebehandling i Katrineholm för ett friskare du", CTA button, Bokadirekt rating badge
2. **Benefits** — 3 icon cards (Balansera humöret, Återställ dygnsrytmen, Bli mer produktiv)
3. **Featured Treatments** — Grid of first 6 `featured: true` services as image overlay cards, linking to `behandlingar.php#id`
4. **IR Bastu Banner** — Split banner promoting infrared sauna add-on
5. **Friskvård Partners** — Epassi, Benify, Wellnet logos with explainer text
6. **About Nancy** — Split banner with Nancy's photo and personal message
7. **How to Book** — 3 step cards (Välj behandling, Utse tid, Betala)
8. **Reviews** — Horizontal scroll of 4 review cards with star ratings
9. **CTA Banner** — Included via `cta-booking.php` template
10. **Contact** — Email/phone CTAs, contact info card with personal message from Nancy
11. **Map** — Google Maps embed of salon location
12. **Footer** — Included via `footer.php` template

---

## 9. What's Done (Phases 1 & 2)

### Phase 1: Data Layer + Security
- [x] `.htaccess` — `mod_rewrite` security rules, `mod_deflate` gzip, `mod_expires` caching
- [x] `src/helpers.php` — All utility functions
- [x] `src/data/salon.php` — Complete salon configuration
- [x] `src/data/services.json` — 11 treatments with real pricing from the live site

### Phase 2: Global Layout + Homepage
- [x] `src/templates/header.php` — Full HTML head, JSON-LD schema, responsive nav
- [x] `src/templates/footer.php` — Three-column footer with auto-generated content
- [x] `src/templates/cta-booking.php` — Reusable CTA banner
- [x] `assets/css/style.css` — Complete design system
- [x] `assets/js/main.js` — Mobile nav toggle
- [x] `assets/images/` — 21 images migrated from WordPress backup
- [x] `index.php` — Complete homepage with all 12 sections
- [x] `.claude/launch.json` — Dev server configuration

---

## 10. What's Left (Phase 3 — Remaining Pages)

### `behandlingar.php` — Treatment Menu Page
- List ALL 11 treatments (not just featured)
- Each treatment needs: anchor ID matching `service['id']`, title, long_description, benefits list, pricing table (all options with duration + price), image, and a Bokadirekt deep-link CTA button using `get_booking_url($service['id'])`
- The footer already links to `behandlingar.php#service-id` for every treatment
- Match the visual style of treatment detail pages on the live WordPress site

### `friskvard.php` — Friskvård (Corporate Wellness) Page
- Explain what friskvård is and how to use it for massage
- Feature the three partner platforms: Epassi, Benify, Wellnet
- Explain the Swedish corporate wellness deduction (friskvårdsavdrag) — the employer-provided wellness benefit
- Include booking CTA pointing to Bokadirekt
- Use `$page_title` and `$page_description` overrides for SEO

### `kontakt.php` — Contact Page
- Address: Tallbacken 26, 64151 Katrineholm
- Phone: 0707811007 (click-to-call)
- Email: nancy@cmlmassagewellness.se (mailto: link)
- Opening hours (from `salon.php`)
- Google Maps embed (same as homepage or full-width)
- Personal message from Nancy
- No contact form — decided to use mailto: link instead (a `mail()` handler may come later)

### Phase 4: Verification (After Phase 3)
- Run `php -S localhost:8000` and visually compare every page against the live site
- Check all internal links work
- Check all Bokadirekt deep links work
- Lighthouse audit (target: 95+)
- Mobile responsiveness check
- Consider WebP image conversion (the deploy pipeline already handles jpg/png)

---

## 11. Known Issues and TODOs

1. **Bokadirekt rating count is hardcoded** — `salon.php` line 41 has `'count' => 1787` with a TODO comment. The user wants to find a way to auto-update this. Bokadirekt has no public API; this may need scraping or manual updates.

2. **Deploy pipeline `paths-ignore` includes `assets/**`** — This means pushing only image changes won't trigger a deploy. Images will deploy the next time any non-ignored file changes. This is the user's intentional design.

3. **No `.gitignore`** — There isn't one in the repo root. Not currently an issue since there are no build tools or dependencies, but may want one if node tools are added later.

4. **Contact form** — Replaced with `mailto:` link by the user's decision. A `mail()` handler is a potential future addition.

5. **No dark mode** — CSS has no dark mode support. Not a requirement.

6. **Images are original WordPress sizes** — Not optimized/compressed. WebP conversion could improve Lighthouse performance score.

---

## 12. Development Workflow

### Local Development
```bash
cd ~/fullstack/cml-massage-rebuild
php -S localhost:8000
```
Or use the `.claude/launch.json` dev server config in the Claude browser pane.

### Git Workflow
- All work on `dev` branch
- Merge to `main` triggers deploy to one.com
- Commit messages: conventional commits style (feat:, fix:, chore:, assets:)

### Commit History (Relevant)
```
bfb7b03 feat: add PHP templates and complete homepage
87a01c1 assets: add all site images from WordPress backup
0b3a6f9 feat: add complete CSS design system and mobile nav JS
8c235ea chore: add PHP dev server config for local preview
3cb030c helpers.php
0910472 salon.php config file
997bc78 services JSON
7c3a116 upgraded .htaccess for security, speed and caching
```

---

## 13. User Preferences (for the Next Session)

- **K&R brace style** — Same-line opening braces on all PHP control structures and functions
- **Nullable types** — Use `?string` with `?? ''` null coalescing, not bare `string`
- **String interpolation** — `"{$var}"` not `$var . ''`
- **No trailing summaries** — The user wants terse responses; don't recap what you just did
- **Swedish content** — All user-facing text is in Swedish. Code (variable names, comments if any) in English
- **Everything escaped** — Every `<?= ... ?>` must go through `e()`. No exceptions
- **The user is learning** — They ask detailed questions about PHP patterns (static memoization, `$_SERVER` superglobal, etc.) and appreciate clear explanations framed for someone coming from a non-PHP background
- **The user edits files directly** — They make their own changes between sessions (added comments to `helpers.php`, updated `salon.php` with real data). Always check current file state before assuming what's there

---

## 14. Live Site Reference

The WordPress site is still live at `https://www.cmlmassagewellness.se/` — use it as the visual reference for remaining pages. The WordPress backup is at `~/Documents/cml_backup/` with images in `uploads/2024/05/`.

---

## 15. Quick Start for Next Session

```
Read this handoff, then:

1. Read the three files in src/data/ to confirm current state
2. Read assets/css/style.css to understand existing component styles
3. Start with behandlingar.php — it's the most content-heavy page and
   the footer already links to it
4. Run php -S localhost:8000 and verify in browser
5. Then friskvard.php, then kontakt.php
6. Phase 4: full visual comparison + Lighthouse audit
```
