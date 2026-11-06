<?php
// Determine the active page for navigation highlighting
$current_page = basename($_SERVER['PHP_SELF']);

// Navigation items: [label, href, icon, active_condition]
$nav_items = [
    ['label' => 'Home',           'href' => 'index.php',           'icon' => 'house-door'],
    ['label' => 'About Us',       'href' => 'about.php',           'icon' => 'info-circle'],
    ['label' => 'Services',       'href' => 'services.php',        'icon' => 'tools'],
    ['label' => 'Blog',           'href' => 'blog.php',            'icon' => 'journal-text'],
    ['label' => 'Contact Us',     'href' => 'contact.php',         'icon' => 'telephone'],
];
?>

<header class="site-header" id="siteHeader">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="navbar-brand" href="index.php">
                <img class="site-logo" src="assets/images/gravity-hub-logo.png" srcset="<?php echo webp_image_srcset('assets/images/gravity-hub-logo.png'); ?>" alt="Gravity Hub" width="1520" height="652" decoding="async">
            </a>

            <button class="navbar-toggler" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mainNav">
                <span class="navbar-toggler-icon"><span></span></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php foreach ($nav_items as $item): 
                        $is_active = ($current_page === $item['href']);
                    ?>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $is_active ? ' active' : ''; ?>" 
                           href="<?php echo htmlspecialchars($item['href']); ?>" 
                           <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                            <?php echo htmlspecialchars($item['label']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Mobile CTA -->
                <div class="d-lg-none mt-3 text-center">
                    <a href="request-service.php" class="btn btn-primary btn-sm px-4">Request a Service <i class="bi bi-arrow-up-right"></i></a>
                </div>
            </div>
            <a href="request-service.php" class="header-cta d-none d-lg-inline-flex"<?php echo $current_page === 'request-service.php' ? ' aria-current="page"' : ''; ?>>Request a Service <i class="bi bi-arrow-up-right"></i></a>
        </nav>
    </div>
</header>