<?php
$site_url = getenv('ENERGYHUB_SITE_URL');
$site_url = $site_url !== false ? rtrim($site_url, '/') : '';
$canonical_url = '';
$social_image_url = '';
$page_route = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');

if ($site_url !== '' && filter_var($site_url, FILTER_VALIDATE_URL)) {
    if (strtolower((string) parse_url($site_url, PHP_URL_SCHEME)) === 'https') {
        $canonical_path = $page_route === 'index.php' ? '/' : '/' . $page_route;
        if ($page_route === 'blog.php' && isset($active_post['slug'])) {
            $canonical_path .= '?slug=' . rawurlencode($active_post['slug']);
        }
        $canonical_url = $site_url . $canonical_path;

        if (!empty($page_social_image)) {
            $social_image_url = $site_url . '/' . ltrim(webp_image_path($page_social_image), '/');
        }
    } else {
        error_log('EnergyHub SEO: ENERGYHUB_SITE_URL must use HTTPS; canonical metadata was omitted.');
    }
} elseif ($site_url !== '') {
    error_log('EnergyHub SEO: ENERGYHUB_SITE_URL is invalid; canonical metadata was omitted.');
}

$escaped_page_title = htmlspecialchars($page_title ?? 'EnergyHub Services', ENT_QUOTES, 'UTF-8');
$escaped_page_description = htmlspecialchars(
    $page_description ?? 'Professional technical services for electrical equipment and energy-monitoring devices.',
    ENT_QUOTES,
    'UTF-8'
);
$organization_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'EnergyHub Services',
    'email' => 'gravityhubautomation@gmail.com',
    'telephone' => '+91 99834 98888',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="<?php echo $escaped_page_description; ?>">
    <meta name="author" content="EnergyHub Services">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="theme-color" content="#060a12">

    <title><?php echo $escaped_page_title; ?></title>
    <meta property="og:type" content="<?php echo isset($active_post) && $active_post !== null ? 'article' : 'website'; ?>">
    <meta property="og:site_name" content="EnergyHub Services">
    <meta property="og:title" content="<?php echo $escaped_page_title; ?>">
    <meta property="og:description" content="<?php echo $escaped_page_description; ?>">
    <meta property="og:locale" content="en_IN">
    <meta name="twitter:card" content="<?php echo $social_image_url !== '' ? 'summary_large_image' : 'summary'; ?>">
    <meta name="twitter:title" content="<?php echo $escaped_page_title; ?>">
    <meta name="twitter:description" content="<?php echo $escaped_page_description; ?>">
    <?php if ($canonical_url !== ''): ?>
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>
    <?php if ($social_image_url !== ''): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($social_image_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($social_image_url, ENT_QUOTES, 'UTF-8'); ?>">
    <?php endif; ?>

    <link rel="icon" type="image/webp" sizes="512x512" href="assets/images/gravity-hub-icon.webp?v=<?php echo filemtime(__DIR__ . '/../assets/images/gravity-hub-icon.webp'); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/images/gravity-hub-icon.png?v=<?php echo filemtime(__DIR__ . '/../assets/images/gravity-hub-icon.png'); ?>">
    <link rel="apple-touch-icon" href="assets/images/gravity-hub-icon.png?v=<?php echo filemtime(__DIR__ . '/../assets/images/gravity-hub-icon.png'); ?>">

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <!-- Bootstrap 5 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Local Stylesheet -->
    <link href="assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/style.css'); ?>" rel="stylesheet">

    <!-- Bootstrap Icons (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script type="application/ld+json"><?php echo json_encode($organization_schema, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>
</head>
<body <?php echo isset($body_class) ? 'class="' . htmlspecialchars($body_class) . '"' : ''; ?>>
    <a class="skip-link" href="#main-content">Skip to main content</a>