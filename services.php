<?php
$page_title = 'Services | EnergyHub Services';
$page_description = 'Explore six technical services covering fault diagnosis, installation, maintenance, component support, site assistance, and custom technical tasks.';
$page_social_image = 'assets/images/photo1.1.png';
$body_class = 'page-services';

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
            <h1>Our Services</h1>
            <p class="lead">Explore six ways we may be able to help with electrical equipment, energy monitors, and related technical tasks. Scope and availability are reviewed before work is agreed.</p>
            <div class="hero-cta">
                <a href="request-service.php" class="btn btn-primary btn-lg">Request a Service <i class="bi bi-arrow-up-right"></i></a>
                <a href="#services" class="btn btn-outline btn-lg">Browse Services</a>
            </div>
        </div>
    </div>
</section>

<!-- Service Cards -->
<section class="section" id="services">
    <div class="container">
        <div class="services-page-grid">
            <?php $index = 1; foreach ($services as $service): ?>
            <div class="service-detail-card reveal" id="<?php echo htmlspecialchars($service['id']); ?>">
                <div class="service-detail-image">
                    <img src="assets/images/<?php echo htmlspecialchars($service['image']); ?>" srcset="<?php echo webp_image_srcset('assets/images/' . $service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" loading="lazy" decoding="async">
                </div>
                <div class="service-detail-body">
                    <span class="service-number">0<?php echo $index; ?></span>
                    <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p><?php echo htmlspecialchars($service['long']); ?></p>
                    <dl class="service-detail-list">
                        <div>
                            <dt>What it covers</dt>
                            <dd><?php echo htmlspecialchars($service['coverage']); ?></dd>
                        </div>
                        <div>
                            <dt>What to share</dt>
                            <dd><?php echo htmlspecialchars($service['provide']); ?></dd>
                        </div>
                        <div>
                            <dt>What happens next</dt>
                            <dd><?php echo htmlspecialchars($service['next']); ?></dd>
                        </div>
                    </dl>
                    <p class="service-detail-note"><i class="bi bi-info-circle" aria-hidden="true"></i> <?php echo htmlspecialchars($service['note']); ?></p>
                    <a href="request-service.php?service=<?php echo urlencode($service['id']); ?>" class="btn btn-primary">Request This Service</a>
                </div>
            </div>
            <?php $index++; endforeach; ?>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="process-section" id="how-it-works">
    <div class="container">
        <div class="section-header reveal">
            <span class="process-eyebrow">How It Works</span>
            <h2>From your first message to an agreed plan</h2>
            <p>We review your details, explain possible next steps, and confirm the scope and applicable costs before work begins.</p>
        </div>
        <div class="process-narrow">
            <div class="process-grid reveal">
                <div class="process-connector"></div>
                <?php foreach ($process_steps as $step): ?>
                <div class="process-step">
                    <div class="step-number"><span><?php echo htmlspecialchars($step['step']); ?></span></div>
                    <h4><?php echo htmlspecialchars($step['title']); ?></h4>
                    <p><?php echo htmlspecialchars($step['text']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section" id="faq">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-eyebrow">FAQs</span>
            <h2>Quick answers</h2>
            <p>What to know before requesting device support.</p>
        </div>
        <div class="faq-grid" id="faq-grid">
            <?php foreach ($faqs as $index => $faq): 
                $btnId = 'svc-faq-btn-' . $index;
                $collapseId = 'svc-faq-collapse-' . $index;
            ?>
            <div class="faq-item reveal">
                <button class="faq-button" type="button" aria-expanded="false" aria-controls="<?php echo $collapseId; ?>" id="<?php echo $btnId; ?>">
                    <?php echo htmlspecialchars($faq['q']); ?>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer" id="<?php echo $collapseId; ?>">
                    <p><?php echo htmlspecialchars($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="faq-more-wrap">
            <button class="btn btn-outline faq-more-toggle" type="button"
                    aria-expanded="false" aria-controls="faq-grid" hidden>
                Show all FAQs
            </button>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="final-cta-section" id="cta">
    <div class="final-cta-bg" aria-hidden="true">
        <img src="assets/images/photo11.1.png" srcset="<?php echo webp_image_srcset('assets/images/photo11.1.png'); ?>" alt="" loading="lazy" decoding="async">
    </div>
    <div class="container final-cta-content reveal">
        <h2>Not sure which service fits?</h2>
        <p>Describe the equipment and the result you need. We will review your request and discuss the suitable next step.</p>
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