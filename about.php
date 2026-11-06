<?php
$page_title = 'About Us | EnergyHub Services';
$page_description = 'Learn about EnergyHub Services and its practical technical support for equipment, energy-monitoring devices, and related tasks.';
$page_social_image = 'assets/images/photo7.png';
$body_class = 'page-about';

require_once __DIR__ . '/includes/service-data.php';

include 'includes/head.php';
include 'includes/header.php';
?>

<main id="main-content">
<!-- Page Hero -->
<section class="page-hero">
    <div class="hero-background" aria-hidden="true">
        <img class="hero-slide is-active" src="assets/images/photo1.1.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.1.png'); ?>" alt="" aria-hidden="false" fetchpriority="high" decoding="async">
        <img class="hero-slide" src="assets/images/photo1.2.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.2.png'); ?>" alt="" aria-hidden="true" loading="lazy" decoding="async">
        <img class="hero-slide" src="assets/images/photo1.3.png" srcset="<?php echo webp_image_srcset('assets/images/photo1.3.png'); ?>" alt="" aria-hidden="true" loading="lazy" decoding="async">
    </div>
    <div class="hero-bg-overlay" aria-hidden="true"></div>
    <div class="container hero-container">
        <div class="page-hero-content hero-content reveal">
            <h1>About Us</h1>
            <p class="lead">We help you explain the issue, understand the options, and agree on a practical next step for your equipment.</p>
            <div class="hero-cta">
                <a href="services.php" class="btn btn-primary btn-lg">Explore Our Services <i class="bi bi-arrow-up-right"></i></a>
                <a href="#about-intro" class="btn btn-outline btn-lg">Learn About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Company Introduction -->
<section class="section about-story-section" id="about-intro">
    <div class="container">
        <div class="about-story-panel reveal">
            <div class="about-story-copy">
                <h2>Technical support that starts with listening</h2>
                <p><?php echo htmlspecialchars($about['intro']); ?></p>
            </div>
            <div class="about-motion-art" aria-hidden="true">
                <div class="motion-halo"></div>
                <div class="motion-orbit motion-orbit-outer">
                    <span class="motion-node motion-node-top"><i class="bi bi-lightning-charge-fill"></i></span>
                    <span class="motion-node motion-node-bottom"><i class="bi bi-activity"></i></span>
                </div>
                <div class="motion-orbit motion-orbit-inner">
                    <span class="motion-node motion-node-side"><i class="bi bi-cpu"></i></span>
                </div>
                <div class="motion-core">
                    <span class="motion-core-ring"></span>
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <span class="motion-signal motion-signal-one"></span>
                <span class="motion-signal motion-signal-two"></span>
            </div>
        </div>
    </div>
</section>

<!-- Mission -->
<section class="section" style="background: var(--color-bg-light);">
    <div class="container">
        <div class="section-header reveal">
            <h2>Our Mission</h2>
            <p>A useful service begins with understanding the equipment, the problem, and the result you need.</p>
        </div>
        <div class="reveal" style="max-width: 720px; margin: 0 auto; text-align: center;">
            <p style="font-size: 1.25rem; color: var(--color-text-muted); font-style: italic;">"<?php echo htmlspecialchars($about['mission']); ?>"</p>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section">
    <div class="container">
        <div class="section-header reveal">
            <h2>What you can expect from us</h2>
            <p>Clear communication at each step, from the first request to agreed work.</p>
        </div>
        <div class="values-grid">
            <?php foreach ($about['values'] as $value): ?>
            <div class="value-card reveal">
                <i class="bi bi-check-circle" style="color: var(--color-secondary); font-size: 1.5rem; margin-bottom: var(--space-3);"></i>
                <h4><?php echo htmlspecialchars($value); ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Service Approach -->
<section class="section">
    <div class="container">
        <div class="approach-grid reveal">
            <div class="approach-content">
                <h3>A clear, considered service process</h3>
                <p><?php echo htmlspecialchars($about['approach']); ?></p>
                <p>Support may include troubleshooting, installation, maintenance, component assessment, on-site assistance where available, or a custom technical task. A site visit, repair, or material sourcing is not assumed until feasibility, availability, scope, and applicable costs have been reviewed with you.</p>
            </div>
            <div class="approach-image apple-blend-light">
                <img src="assets/images/photo7.png" srcset="<?php echo webp_image_srcset('assets/images/photo7.png'); ?>" alt="Energy-monitoring dashboards in a modern technical workspace" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<!-- Why Customers Choose Us -->
<section class="section" style="background: var(--color-bg-light);">
    <div class="container">
        <div class="section-header reveal">
            <h2>Support with expectations made clear</h2>
            <p>We review the details before confirming what can be done, where, and when.</p>
        </div>
        <div class="why-list reveal">
            <?php foreach ($trust_highlights as $highlight): ?>
            <li>
                <i class="bi bi-<?php echo htmlspecialchars($highlight['icon']); ?>"></i>
                <div>
                    <h4><?php echo htmlspecialchars($highlight['title']); ?></h4>
                    <p><?php echo htmlspecialchars($highlight['text']); ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="final-cta-section" id="cta">
    <div class="final-cta-bg" aria-hidden="true">
        <img src="assets/images/photo11.1.png" srcset="<?php echo webp_image_srcset('assets/images/photo11.1.png'); ?>" alt="" loading="lazy" decoding="async">
    </div>
    <div class="container final-cta-content reveal">
        <h2>Have a technical requirement?</h2>
        <p>Tell us about the equipment and the outcome you need. We will review your request and discuss the next step.</p>
        <div class="final-cta-buttons">
            <a href="request-service.php" class="btn btn-white btn-lg">Request a Service</a>
            <a href="contact.php" class="btn btn-white-outline btn-lg">Contact Us</a>
            <a href="https://wa.me/919983498888" class="btn btn-white-outline btn-lg" target="_blank"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/main.js?v=<?php echo filemtime(__DIR__ . '/assets/js/main.js'); ?>" defer></script>
</body>
</html>