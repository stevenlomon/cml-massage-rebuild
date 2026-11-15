<?php
declare(strict_types=1);

function e(?string $value): string {
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// static null check memoization pattern
function get_salon_data(): array {
    static $data = null;
    if ($data === null) {
        $data = require __DIR__ . '/data/salon.php';
    }
    return $data;
}

function get_services(): array {
    static $services = null;
    if ($services === null) {
        $json = file_get_contents(__DIR__ . '/data/services.json');
        $services = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
    return $services;
}

function get_reviews(): array {
    static $reviews = null;
    if ($reviews === null) {
        $json = file_get_contents(__DIR__ . '/data/reviews.json');
        $reviews = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
    return $reviews;
}

function get_booking_url(?string $service_id = null): string {
    $salon = get_salon_data();
    $base = $salon['bokadirekt_url'];
    $utm = '?utm_source=cmlmassagewellness.se&utm_medium=website&utm_campaign=booking_cta';
    return $service_id ? "{$base}/{$service_id}{$utm}" : "{$base}{$utm}";
}

function get_current_page(): string {
    $script = basename($_SERVER['SCRIPT_NAME'] ?? '', '.php'); // `$_SERVER['SCRIPT_NAME']` gives the file name being executed, `basename` strips the file path and `.php`
    return $script === '' ? 'index' : $script;
}

function is_active_page(string $page): bool {
    return get_current_page() === $page;
}
